<?php

namespace App\Http\Controllers\Admin\Catalog;

use Illuminate\Http\Request;
use App\Models\Catalog\Course;
use App\Models\Catalog\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Catalog\CourseOutcome;
use App\Models\Catalog\CourseSyllabus;
use App\Models\Catalog\DeliveryMethod;
use App\Models\Catalog\Exam;
use App\Models\CMS\Faq;
use App\Models\Seo\Meta;

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
                ->leftJoin('course_translations', function ($join) use ($locale) {
                    $join->on('course_translations.course_id', 'courses.id')
                        ->where('course_translations.locale', $locale);
                })
                ->leftJoin('topics', 'topics.id', 'courses.topic_id')
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
                    'courses.id',
                    'courses.duration',
                    'courses.is_featured',
                    'courses.slug',
                    'courses.created_at',
                    'courses.deleted_at',
                    'course_translations.name as course_name',
                    'topic_translations.name as topic_name',
                    'category_translations.name as category_name'
                )
                ->groupBy('courses.id');

            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.catalog.courses.edit', $row->id);
                    return view('theme.adminlte.components._table-actions', compact('editUrl', 'row'))->render();
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at?->format('d-M-Y  h:m A');
                })
                ->rawColumns(['action'])
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
        $data['deliveryMethods'] = DeliveryMethod::all();


        return view('theme.adminlte.catalog.courses.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
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
            $data['exam_included'] = $request->boolean('exam_included');

            $course = Course::create($data);

            foreach (active_locals() as $locale) {
                $course->translations()->create([
                    'locale' => $locale,
                    'name' => $request->input("name.$locale"),
                    'short_description' => $request->input("short_description.$locale"),
                    'content' => $request->input("content.$locale"),
                ]);
            }

            DeliveryMethod::sync($request, $course);
            Meta::store($request, $course);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return response()->json(['message' => 'Course created successfully.', 'redirect' => route('admin.catalog.courses.index')]);
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
        $course         = Course::withTrashed()->with('translations')->findOrFail($id);
        $categories     = Category::with('translation')->get();

        $data['deliveryMethods']    = DeliveryMethod::all();
        $data['exams']              = Exam::all();
        $data['course']             = $course;
        $data['categories']         = $categories;

        return view('theme.adminlte.catalog.courses.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, string $id)
    {
        $course = Course::findOrFail($id);

        DB::beginTransaction();

        try {
            $data = $request->validated();

            // File uploads
            if ($request->hasFile('logo')) {
                $data['logo'] = $request->file('logo')->store('courses', 'public');
            } else {
                unset($data['logo']);
            }
            if ($request->hasFile('icon')) {
                $data['icon'] = $request->file('icon')->store('courses', 'public');
            } else {
                unset($data['icon']);
            }
            if ($request->hasFile('banner')) {
                $data['banner'] = $request->file('banner')->store('courses', 'public');
            } else {
                unset($data['banner']);
            }

            if ($request->hasFile('prerequisites_image')) {
                $data['prerequisites_image'] = $request->file('prerequisites_image')->store('courses', 'public');
            } else {
                unset($data['prerequisites_image']);
            }

            if ($request->hasFile('overview_image')) {
                $data['overview_image'] = $request->file('overview_image')->store('courses', 'public');
            } else {
                unset($data['overview_image']);
            }

            if ($request->hasFile('who_should_attend_image')) {
                $data['who_should_attend_image'] = $request->file('who_should_attend_image')->store('courses', 'public');
            } else {
                unset($data['who_should_attend_image']);
            }

            if ($request->hasFile('outcomes_image')) {
                $data['outcomes_image'] = $request->file('outcomes_image')->store('courses', 'public');
            } else {
                unset($data['outcomes_image']);
            }

            if ($request->hasFile('exam_image')) {
                $data['exam_image'] = $request->file('exam_image')->store('courses', 'public');
            } else {
                unset($data['exam_image']);
            }



            $data['is_active']      = $request->boolean('is_active');
            $data['is_featured']    = $request->boolean('is_featured');
            $data['is_latest']    = $request->boolean('is_latest');
            $data['is_trending']    = $request->boolean('is_trending');
            $data['is_popular']    = $request->boolean('is_popular');
            $data['exam_included']  = $request->boolean('exam_included');

            $course->update($data);

            foreach (active_locals() as $locale) {
                $course->translations()->updateOrCreate(
                    ['locale' => $locale],
                    [
                        'name' => $request->input("name.$locale"),
                        'short_description' => $request->input("short_description.$locale"),
                        'overview' => $request->input("overview.$locale"),
                        'who_should_attend' => $request->input("who_should_attend.$locale"),
                        'prerequisites' => $request->input("prerequisites.$locale"),
                    ]
                );
            }

            DeliveryMethod::sync($request, $course);
            Meta::store($request, $course);
            Faq::store($request, $course);
            CourseOutcome::store($request, $course);
            CourseSyllabus::store($request, $course);
            Exam::sync($request, $course);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return response()->json(['message' => 'Course updated successfully.', 'redirect' => route('admin.catalog.courses.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
