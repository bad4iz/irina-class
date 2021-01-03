<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

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
        $galleries = Gallery::all();
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

        $gallery = Gallery::create([
            'title' => request('title'),
            'preview' => $preview,
            'date' => request('date'),
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
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
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
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
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
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        Storage::delete($gallery->preview);
        $gallery->delete();

        return redirect()->route('gallery.index');
    }
}
