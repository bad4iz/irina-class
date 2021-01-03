<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\PhotosOurClass;

class IndexController extends Controller
{
    public function index()
    {
        $news = News::latest()->orderBy('created_at', 'desc')->paginate(10);;
        $photosOurClass = PhotosOurClass::latest()->orderBy('created_at', 'desc')->paginate(10);;
        return view('index', compact('news', 'photosOurClass'  ));
    }
}
