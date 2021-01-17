<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addAccess = false;
        if (Gate::allows('add-gallery')) {
            $addAccess = true;
        }
        $galleries = gallery::all();
        return view('gallery.index', compact('galleries','addAccess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
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
            'description' => 'required',
            'title' => 'required',
            'date' => 'date',
        ]);

        $preview = $request->file('preview')->store('images',);

        $gallery = gallery::create([
            'title' => request('title'),
            'preview' => $preview,
            'date' => request('date'),
            'is_moderation' => true, // пока так . потом когда надо будет новости админить .. удалить
            'user_id' => Auth::user()->id,
            'description' => request('description'),
        ]);

        $addAccess = false;
        if (Gate::allows('change-gallery')) {
            $addAccess = true;
        }

        return redirect()->route('gallery.edit', [$gallery]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(gallery $gallery)
    {
        $deleteAccess = false;
        $changeAccess = false;
        if (Gate::allows('delete-gallery')) {
            $deleteAccess = true;
        }
        if (Gate::allows('change-gallery')) {
            $changeAccess = true;
        }
        return view('gallery.show', compact('gallery','deleteAccess', 'changeAccess'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(gallery $gallery)
    {
        $deleteAccess = false;
        $changeAccess = false;
        if (Gate::allows('delete-gallery')) {
            $deleteAccess = true;
        }
        if (Gate::allows('change-gallery')) {
            $changeAccess = true;
        }
        return view('gallery.edit', compact('gallery','deleteAccess', 'changeAccess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(gallery $gallery)
    {
        $gallery->destr();

        return redirect()->route('gallery.index');
    }
}
