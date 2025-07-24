<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home(){
        $data['blogs']   =   News::all();
        return view('theme.xacademia.home',$data);

    }
}
