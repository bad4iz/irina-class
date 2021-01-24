<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;

class IndexController extends Controller
{
    public function index()
    {
        $news = News::latest()->orderBy('created_at', 'desc')->paginate(10);;

        $galleries = Gallery::latest()->orderBy('created_at', 'desc')->paginate(9);;
        return view('index', compact('news', 'galleries'  ));
    }
}
