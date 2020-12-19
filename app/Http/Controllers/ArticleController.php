<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
        return redirect()->route('article.index');
    }
}
