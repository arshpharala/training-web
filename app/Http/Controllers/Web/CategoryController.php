<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){

        return 'Welcome';

    }
    function show($slug){

        return $slug;

    }
}
