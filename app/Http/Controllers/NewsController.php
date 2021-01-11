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
        $addAccess = false;
        if (Gate::allows('add-new')) {
            $addAccess = true;
        }
        $news = News::orderBy('created_at', 'desc')->get();
        return view('new.index',  compact('news','addAccess'));
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
            'user_id' => Auth::user()->id,
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
     * @param  \App\Models\News  $new
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(News $new)
    {
        return view('new.edit', compact('new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $new
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $new)
    {
        $validatedData = $request->validate([
            'preview' => 'image|max:1024',
            'intro' => 'required',
            'event_date' => 'date',
            'title' => 'required',
        ]);

        $new->update([
            'title' => request('title'),
            'news-trixFields' => request('news-trixFields'),
            'attachment-news-trixFields' => request('attachment-news-trixFields'),
            'event_date' => request('event_date'),
            'intro' => request('intro'),
        ]);

        return redirect()->route('admin.index');
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
