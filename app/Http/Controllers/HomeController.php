<?php

namespace App\Http\Controllers;

use App\Models\Catalog\Category;
use App\Models\Catalog\Course;
use App\Models\CMS\News;
use App\Models\CMS\Page;
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


        $statistics = Statistic::where('is_active', 1)->get();

        $data['page'] = $page;
        $data['meta'] = $page->metaForLocale() ?? null;

        $data['testimonials'] = $testimonials;
        $data['latestNews'] = $latestNews;
        $data['statistics'] = $statistics;
        $data['latestCourses'] = $latestCourses;

        $data['categories'] = $categories;
        $data['blogs']      =   News::with('translation')->get();

        return view('theme.xacademia.home', $data);
    }
}
