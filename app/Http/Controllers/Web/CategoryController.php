<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Catalog\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    function index(){

        return 'Welcome';

    }
    function show($slug){

        $category = Category::with('translation','topics.translation', 'topics.courses.translation')->where('slug', $slug)->first();

        $data['category'] = $category;

        // return $category;
        return view('theme.xacademia.catalog.categories.show', $data);

    }
}
