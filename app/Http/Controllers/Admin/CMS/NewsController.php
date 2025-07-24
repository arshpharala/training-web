<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Models\CMS\News;
use App\Models\Seo\Meta;
use Illuminate\Http\Request;
use App\Models\Catalog\Category;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $locale = app()->getLocale();

            $data = News::withTrashed()
                ->leftJoin('news_translations as translations', function ($join) use ($locale) {
                    $join->on('translations.news_id', 'news.id')->where('translations.locale', $locale);
                })
                ->leftJoin('categories', 'categories.id', 'news.category_id')
                ->leftJoin('category_translations', function ($join) use ($locale) {
                    $join->on('category_translations.category_id', 'categories.id')->where('category_translations.locale', $locale);
                })
                ->select('news.id', 'news.is_featured', 'news.slug', 'news.created_at', 'news.deleted_at', 'translations.title', 'category_translations.name as category_name')
                ->groupBy('news.id');

            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.cms.news.edit', $row->id);
                    $deleteUrl = route('admin.cms.news.destroy', $row->id);
                    // $restoreUrl = route('admin.cms.news.restore', $row->id);
                    return view('theme.adminlte.components._table-actions', compact('editUrl', 'deleteUrl', 'row'))->render();
                })

                ->editColumn('created_at', function ($row) {
                    return $row->created_at?->format('d-M-Y  h:m A');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view("theme.adminlte.cms.news.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['news']           =   new News();
        $data['categories']     =   Category::all();

        return view("theme.adminlte.cms.news.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            $data['banner']         = $request->hasFile('banner') ? $request->file('banner')->store('news', 'public') : null;
            $data['is_active']      = $request->boolean('is_active');
            $data['is_featured']    = $request->boolean('is_featured');
            $data['is_guide']       = $request->boolean('is_guide');
            $data['created_by']     = auth('admin')->user()->id;

            $news = News::create($data);

            foreach (active_locals() as $locale) {
                $news->translations()->create([
                    'locale'            => $locale,
                    'title'             => $request->input("title.$locale"),
                    'short_description' => $request->input("short_description.$locale"),
                    'content'           => $request->input("content.$locale"),
                ]);
            }

            Meta::store($request, $news);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return response()->json(['message' => 'News created successfully.', 'redirect' => route('admin.cms.news.index')]);
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
        $data['object']         =   News::findOrFail($id);
        $data['categories']    =   Category::all();
        $data['url']            =   route("admin.cms.news.update", ['news' => $id]);
        $data['method']         =   "PUT";
        return view("theme.adminlte.cms.news.form", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, string $id)
    {
        $object               =     News::findOrFail($id);
        $object->title        =     $request->title;
        $object->slug         =     $request->slug;
        $object->intro        =     $request->intro;
        $object->content      =     $request->content;
        $object->category_id  =     $request->category_id;
        $object->is_guide     =     empty($request->is_guide) ? 0 : 1;
        // Handle image_1 upload
        if ($request->hasFile('image')) {
            if (File::exists(public_path($object->image))) {
                File::delete(public_path($object->image));
            }
            $image = $request->file('image');
            $filename_1 = 'news_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('news'), $filename_1);
            $object->image = 'news/' . $filename_1;
        }
        $object->update();
        Meta::store($request, $object);
        return response()->json(['message' => 'News Updated successfully.', 'redirect' => route('admin.cms.news.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $object                      =   News::findOrFail($id);
        $object->delete();
        return response()->json(['message' => 'News Deleted successfully.', 'redirect' => route('admin.cms.news.index')]);
    }
}
