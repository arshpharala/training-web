<?php

namespace App\Http\Controllers;

use App\Models\Catalog\Category;
use App\Models\Catalog\Course;
use App\Models\CMS\News;
use App\Models\CMS\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home()
    {

        $categories = Category::with('translation')->orderBy('categories.position')->get();

        $latestCourses = Course::where('is_featured', 1)->get();

        $data['latestCourses'] = $latestCourses;

        $data['categories'] = $categories;
        $data['blogs']      =   News::with('translation')->get();

        return view('theme.xacademia.home', $data);
    }
}
