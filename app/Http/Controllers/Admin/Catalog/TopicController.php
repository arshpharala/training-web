<?php

namespace App\Http\Controllers\Admin\Catalog;

use Illuminate\Http\Request;
use App\Models\Catalog\Topic;
use App\Models\Catalog\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdateTopicRequest;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $locale = app()->getLocale();

            $query = Topic::withTrashed()
                ->leftJoin('topic_translations', function ($join) use ($locale) {
                    $join->on('topic_translations.topic_id', 'topics.id')
                        ->where('topic_translations.locale', $locale);
                })
                ->leftJoin('categories', 'categories.id', 'topics.category_id')
                ->leftJoin('category_translations', function ($join) use ($locale) {
                    $join->on('category_translations.category_id', 'categories.id')
                        ->where('category_translations.locale', $locale);
                })
                ->select(
                    'topics.id',
                    'topics.slug',
                    'topics.is_featured',
                    'topics.position',
                    'topics.created_at',
                    'topics.deleted_at',
                    'topic_translations.name as topic_name',
                    'category_translations.name as category_name'
                )
                ->groupBy('topics.id');

            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    $editUrl    = route('admin.catalog.topics.edit', $row->id);
                    $deleteUrl  = route('admin.catalog.topics.destroy', $row->id);
                    $restoreUrl = route('admin.catalog.topics.restore', $row->id);

                    return view('theme.adminlte.components._table-actions', compact('editUrl', 'deleteUrl', 'restoreUrl', 'row'))->render();
                })
                ->editColumn('created_at', fn($row) => $row->created_at?->format('d-M-Y  h:m A'))
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('theme.adminlte.catalog.topics.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topic      = new Topic();
        $categories = Category::catalog()->with('translation')->get();

        return view('theme.adminlte.catalog.topics.create', compact('topic', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $data['logo']       = $request->file('logo')?->store('topics', 'public');
            $data['icon']       = $request->file('icon')?->store('topics', 'public');
            $data['banner']     = $request->file('banner')?->store('topics', 'public');
            $data['is_active']  = $request->boolean('is_active');
            $data['is_featured'] = $request->boolean('is_featured');

            $topic = Topic::create($data);

            foreach (active_locals() as $locale) {
                $topic->translations()->create([
                    'locale'            => $locale,
                    'name'              => $request->input("name.$locale"),
                    'short_description' => $request->input("short_description.$locale"),
                    'content'           => $request->input("content.$locale"),
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return response()->json(['message' => 'Topic created successfully.', 'redirect' => route('admin.catalog.topics.index')]);
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
        $topic      = Topic::withTrashed()->with('translations')->findOrFail($id);
        $categories = Category::catalog()->with('translation')->get();

        return view('theme.adminlte.catalog.topics.edit', compact('topic', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, string $id)
    {
        $topic = Topic::findOrFail($id);

        DB::beginTransaction();

        try {
            $data = $request->validated();

            if ($request->hasFile('logo'))   $data['logo']   = $request->file('logo')->store('topics', 'public');
            if ($request->hasFile('icon'))   $data['icon']   = $request->file('icon')->store('topics', 'public');
            if ($request->hasFile('banner')) $data['banner'] = $request->file('banner')->store('topics', 'public');

            $data['is_active']   = $request->boolean('is_active');
            $data['is_featured'] = $request->boolean('is_featured');

            $topic->update($data);

            foreach (active_locals() as $locale) {
                $topic->translations()->updateOrCreate(
                    ['locale' => $locale],
                    [
                        'name'              => $request->input("name.$locale"),
                        'short_description' => $request->input("short_description.$locale"),
                        'content'           => $request->input("content.$locale"),
                    ]
                );
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return response()->json(['message' => 'Topic updated successfully.', 'redirect' => route('admin.catalog.topics.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();

        return response()->json([
            'message'   => 'Topic deleted successfully.',
            'redirect'  => route('admin.catalog.topics.index'),
        ]);
    }

    public function restore($id)
    {
        $topic = Topic::withTrashed()->findOrFail($id);
        $topic->restore();

        return response()->json([
            'message'   => 'Topic restored successfully.',
            'redirect'  => route('admin.catalog.topics.index'),
        ]);
    }
}
