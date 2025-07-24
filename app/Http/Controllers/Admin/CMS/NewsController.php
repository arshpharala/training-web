<?php

namespace App\Http\Controllers\Admin\CMS;

use DataTables;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Catalog\Category;
use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;
use App\Models\Seo\Meta;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = News::select('news.*', 'categories.slug as category_name')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->orderBy('news.created_at');

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<a href="' . route('admin.cms.news.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
            })
            ->setRowId('id')
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
        $data['object']         =   new News();
        $data['categories']     =   Category::all();
        $data['url']            =   route("admin.cms.news.store");
        $data['method']         =   "POST";
        return view("theme.adminlte.cms.news.form",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {

        $object               = new News();
        $object->title        = $request->title;
        // Handle image_1 upload
        if ($request->hasFile('image')) {
            $image_1 = $request->file('image');
            $filename_1 = 'news_' . uniqid() . '.' . $image_1->getClientOriginalExtension();
            $image_1->move(public_path('news'), $filename_1);
            $object->image_1 = 'news/' . $filename_1;
        }
        $object->slug         = $request->slug;
        $object->intro        = $request->intro;
        $object->content      = $request->content;
        $object->category_id  = $request->category_id;
        $object->is_guide     = empty($request->is_guide) ? 0 : 1;
        $object->created_by   = auth()->user()->id;
        $object->save();
        Meta::store($request, $object);
        return response()->json(['message' => 'News Created successfully.', 'redirect' => route('admin.cms.news.index')]);
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
        $data['url']            =   route("admin.cms.news.update",['news'=>$id]);
        $data['method']         =   "PUT";
        return view("theme.adminlte.cms.news.form",$data);
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
