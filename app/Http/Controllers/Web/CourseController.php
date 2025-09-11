<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Category;
use App\Models\Catalog\Course;
use App\Models\Catalog\Topic;
use App\Models\CMS\Page;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    function show($topicSlug, $courseSlug)
    {
        $course = Course::query()
            ->whereHas('topic', function ($q) use ($topicSlug) {
                $q->where('slug', $topicSlug);
            })
            ->where('slug', $courseSlug)
            ->with(['topic', 'topic.category'])
            ->firstOrFail();

        $page = Page::with('metas', 'translation')
            ->where('slug', 'course')
            ->active()
            ->first();

        $categories = Category::catalog()
            ->withJoins()
            ->withSelection()->get();

        $latestCourses = Course::query()
            ->withJoins()
            ->withSelection()
            ->where('courses.is_latest', 1)
            ->limit(12)
            ->get();


        $data['page'] = $page;
        $data['categories'] = $categories;

        $data['latestCourses'] = $latestCourses;
        $data['meta'] = $course->metaForLocale() ??  $page->metaForLocale() ?? null;


        $data['course'] = $course;

        return view('theme.xacademia.catalog.courses.show', $data);
    }
}
