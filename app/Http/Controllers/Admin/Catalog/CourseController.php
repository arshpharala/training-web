<?php

namespace App\Http\Controllers\Admin\Catalog;

use Illuminate\Http\Request;
use App\Models\Catalog\Course;
use App\Http\Controllers\Controller;
use App\Models\Catalog\Category;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $locale = app()->getLocale();

            $query = Course::withTrashed()
                ->leftJoin('course_translations as translations', function ($join) use ($locale) {
                    $join->on('translations.course_id', 'courses.id')->where('translations.locale', $locale);
                })
                ->leftJoin('categories', 'categories.id', 'courses.category_id')
                ->leftJoin('category_translations', function ($join) use ($locale) {
                    $join->on('category_translations.category_id', 'categories.id')->where('category_translations.locale', $locale);
                })
                ->select('courses.id', 'courses.icon', 'courses.is_featured', 'courses.slug', 'courses.created_at', 'courses.deleted_at', 'translations.name', 'category_translations.name as category_name')
                ->groupBy('courses.id');


            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.catalog.courses.edit', $row->id);
                    $deleteUrl = route('admin.catalog.courses.destroy', $row->id);
                    $restoreUrl = route('admin.catalog.courses.restore', $row->id);
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
        return view('theme.adminlte.catalog.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories         = Category::with('translation')->get();
        $course             = new Course();

        $data['categories'] = $categories;
        $data['course']     = $course;


        return view('theme.adminlte.catalog.courses.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
