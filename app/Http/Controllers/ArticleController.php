<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
//dd($request->all());
        $validatedData = $request->validate([
            'preview' => 'image|max:1024',
            'intro' => 'required',
            'event_date' => 'required',
            'title' => 'required',
        ]);

        $preview = $request->file('preview')->store('preview');

        Article::create([
            'title' => request('title'),
            'article-trixFields' => request('article-trixFields'),
            'attachment-article-trixFields' => request('attachment-article-trixFields'),
            'preview' => $preview,
            'event_date' => request('event_date'),
            'intro' => request('intro'),
        ]);

        return redirect()->route('all');
    }

    public function destroy(Request $request)
    {

        $id = request('id');
        $article = Article::find($id);

        $attachs = DB::table('trix_attachments')->where('attachable_id', $id)->get();
        foreach ($attachs as $key => $item) {
            Storage::delete('public/'.$item->attachment);
        }
        DB::table('trix_attachments')->where('attachable_id', $id)->delete();
        Storage::delete($article->preview);

        $article->trixAttachments()->delete();
        $article->trixRichText()->delete();
        $article->delete();
        return redirect()->route('all');
    }
}
