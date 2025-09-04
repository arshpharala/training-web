<?php

namespace App\Http\Controllers;

use App\Models\Catalog\Category;
use App\Models\Catalog\Course;
use App\Models\CMS\News;
use App\Models\CMS\Page;
use App\Models\CMS\Partner;
use App\Models\CMS\Statistic;
use App\Models\CMS\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home()
    {

        $categories = Category::with('translation')->orderBy('categories.position')->get();

        $latestCourses = Course::where('is_featured', 1)->get();

        $page = Page::with('metas', 'translation')
            ->active()
            ->findBySlug('home')
            ->first();

        $latestNews = News::active()->limit(6)->with('translation')->get();
        $testimonials = Testimonial::active()->orderBy('position')->with('translation')->get();
        $partners = Partner::active()->orderBy('position')->get();


        $statistics = Statistic::where('is_active', 1)->get();

        $data['page'] = $page;
        $data['meta'] = $page->metaForLocale() ?? null;

        $data['partners'] = $partners;
        $data['testimonials'] = $testimonials;
        $data['latestNews'] = $latestNews;
        $data['statistics'] = $statistics;
        $data['latestCourses'] = $latestCourses;

        $data['categories'] = $categories;
        $data['blogs']      =   News::with('translation')->get();

        return view('theme.xacademia.home', $data);
    }


    public function catalog(Request $request)
    {
        $categories = Category::with([
            'translations',
            'topics.translations',
            'topics.courses.translations'
        ])->get();

        $catalog = [];

        foreach ($categories as $category) {
            $coreName = $category->translation->name ?? $category->slug;
            $catalog[$coreName] = [
                'subs' => []
            ];

            foreach ($category->topics as $topic) {
                $subName = $topic->translation->name ?? $topic->slug;
                $catalog[$coreName]['subs'][$subName] = [
                    'courses' => []
                ];

                foreach ($topic->courses as $course) {
                    $catalog[$coreName]['subs'][$subName]['courses'][] = [
                        'name' => $course->translation->name ?? $course->slug,
                        'slug' => $course->slug
                    ];
                }
            }
        }

        return response()->json($catalog);
    }
}
