<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('new.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new.create');
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
            'event_date' => 'date',
            'title' => 'required',
        ]);

        $preview = $request->file('preview')->store('images',);

        News::create([
            'title' => request('title'),
            'news-trixFields' => request('news-trixFields'),
            'attachment-news-trixFields' => request('attachment-news-trixFields'),
            'preview' => $preview,
            'event_date' => request('event_date'),
            'intro' => request('intro'),
        ]);

        return redirect()->route('new.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $new
     * @return \Illuminate\Http\Response
     */
    public function show(News $new)
    {
        $deleteAccess = false;
        if (Gate::allows('delete-new')) {
            $deleteAccess = true;
        }

        return view('new.show', compact('new','deleteAccess'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $new
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $new)
    {

        $attachs = DB::table('trix_attachments')->where('attachable_id', $new->id)->get();
        foreach ($attachs as $key => $item) {
            Storage::delete('public/'.$item->attachment);
        }
        DB::table('trix_attachments')->where('attachable_id', $new->id)->delete();
        Storage::delete($new->preview);

        $new->trixAttachments()->delete();
        $new->trixRichText()->delete();
        $new->delete();

        return redirect()->route('new.index');
    }
}
