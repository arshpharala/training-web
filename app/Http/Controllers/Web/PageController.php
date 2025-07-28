<?php

namespace App\Http\Controllers\Web;

use App\Models\CMS\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    function about()
    {
        $slug = request()->segment(1);

        $page = Page::with('metas', 'translation')
            ->where('slug', $slug)
            ->active()
            ->first();
            
        $data['page'] = $page;
        $data['meta'] = $page->meta ?? null;


        return view('theme.xacademia.pages.about', $data);
    }
    function contact()
    {
        $page = Page::with('metas')
            ->where('slug', 'home')
            ->where('is_active', true)
            ->first();

        $data['page'] = $page;
        $data['meta'] = $page->meta ?? null;

        return view('theme.xacademia.pages.about', $data);
    }
}
