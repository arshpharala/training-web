<?php

namespace App\Http\Controllers;

use App\Models\Catalog\Category;
use App\Models\CMS\News;
use App\Models\CMS\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home()
    {
        $page = Page::with('metas')
            ->where('slug', 'home')
            ->where('is_active', operator: true)
            ->first();

        $categories = Category::with('translation')->orderBy('categories.position')->get();

        $data['categories'] = $categories;
        $data['page'] = $page;
        $data['meta'] = $page->meta ?? null;
        $data['blogs'] =   News::with('translation')->get();

        return view('theme.xacademia.home', $data);
    }
}
