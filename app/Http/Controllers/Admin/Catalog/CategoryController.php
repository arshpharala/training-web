<?php

namespace App\Http\Controllers\Admin\Catalog;

use Illuminate\Http\Request;
use App\Models\Catalog\Category;
use App\Models\Catalog\Attribute;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Seo\Meta;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $locale = app()->getLocale();

            $query = Category::withTrashed()
                ->leftJoin('category_translations as translations', function ($join) use ($locale) {
                    $join->on('translations.category_id', 'categories.id')->where('translations.locale', $locale);
                })
                ->select('categories.id', 'categories.icon', 'categories.is_featured', 'categories.slug', 'categories.created_at', 'categories.deleted_at', 'translations.name')
                ->groupBy('categories.id');


            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.catalog.categories.edit', $row->id);
                    $deleteUrl = route('admin.catalog.categories.destroy', $row->id);
                    $restoreUrl = route('admin.catalog.categories.restore', $row->id);
                    return view('theme.adminlte.components._table-actions', compact('editUrl', 'deleteUrl', 'restoreUrl', 'row'))->render();
                })
                ->editColumn('icon', function ($row) {
                    return $row->logo
                        ? '<img src="' . asset('storage/' . $row->icon) . '" class="img-sm">'
                        : '';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at?->format('d-M-Y  h:m A');
                })
                ->rawColumns(['action', 'icon'])
                ->make(true);
        }
        return view('theme.adminlte.catalog.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        $data['category'] = $category;

        return view('theme.adminlte.catalog.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            // File uploads
            $data['logo'] = $request->hasFile('logo') ? $request->file('logo')->store('categories', 'public') : null;
            $data['icon'] = $request->hasFile('icon') ? $request->file('icon')->store('categories', 'public') : null;
            $data['banner'] = $request->hasFile('banner') ? $request->file('banner')->store('categories', 'public') : null;
            $data['is_active'] = $request->boolean('is_active');
            $data['is_featured'] = $request->boolean('is_featured');
            $data['blog_only'] = $request->boolean('blog_only');

            $category = Category::create($data);

            foreach (active_locals() as $locale) {
                $category->translations()->create([
                    'locale' => $locale,
                    'name' => $request->input("name.$locale"),
                    'short_description' => $request->input("short_description.$locale"),
                    'content' => $request->input("content.$locale"),
                ]);
            }

            Meta::store($request, $category);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return response()->json(['message' => 'Category created successfully.', 'redirect' => route('admin.catalog.categories.index')]);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category       = Category::withTrashed()->with('translations')->findOrFail($id);
        $categories     = Category::where('id', '!=', $category->id)->get();

        $data['category']       = $category;
        $data['categories']     = $categories;

        return view('theme.adminlte.catalog.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        DB::beginTransaction();

        try {
            $data = $request->validated();

            // File uploads
            if ($request->hasFile('logo')) {
                $data['logo'] = $request->file('logo')->store('categories', 'public');
            } else {
                unset($data['logo']);
            }
            if ($request->hasFile('icon')) {
                $data['icon'] = $request->file('icon')->store('categories', 'public');
            } else {
                unset($data['icon']);
            }
            if ($request->hasFile('banner')) {
                $data['banner'] = $request->file('banner')->store('categories', 'public');
            } else {
                unset($data['banner']);
            }
            $data['is_active'] = $request->boolean('is_active');
            $data['is_featured'] = $request->boolean('is_featured');
            $data['blog_only'] = $request->boolean('blog_only');

            $category->update($data);

            foreach (active_locals() as $locale) {
                $category->translations()->updateOrCreate(
                    ['locale' => $locale],
                    [
                        'name' => $request->input("name.$locale"),
                        'short_description' => $request->input("short_description.$locale"),
                        'content' => $request->input("content.$locale"),
                    ]
                );
            }

            Meta::store($request, $category);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return response()->json(['message' => 'Category updated successfully.', 'redirect' => route('admin.catalog.categories.index')]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([
            'message'   => 'Category deleted successfully.',
            'redirect'  => route('admin.catalog.categories.index'),
        ]);
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();
        return response()->json([
            'message'   => 'Category restored successfully.',
            'redirect'  => route('admin.catalog.categories.index'),
        ]);
    }

    public function bulkDelete(Request $request)
    {
        $request->validate(['ids' => 'required|array']);
        Category::whereIn('id', $request->ids)->delete();

        return response()->json([
            'message'   => 'Categories deleted successfully.',
            'redirect'  => route('admin.catalog.categories.index'),
        ]);
    }

    public function bulkRestore(Request $request)
    {
        $request->validate(['ids' => 'required|array']);
        Category::withTrashed()->whereIn('id', $request->ids)->restore();

        return response()->json([
            'message'   => 'Categories restored successfully.',
            'redirect'  => route('admin.catalog.categories.index'),
        ]);
    }
}
