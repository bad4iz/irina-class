<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $news = News::latest()->orderBy('created_at', 'desc')->paginate(10);;
        return view('index', ['news' => $news]);
    }
}
