<?php

namespace App\Http\Controllers;

use App\Models\PhotosOurClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PhotosOurClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addAccess = false;
        if (Gate::allows('add-photosOurClass')) {
            $addAccess = true;
        }
        $photosOurClass = PhotosOurClass::all();
        return view('photosOurClass.index', compact('photosOurClass','addAccess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photosOurClass.create');
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

        $photosOurClass = PhotosOurClass::create([
            'title' => request('title'),
            'preview' => $preview,
            'date' => request('date'),
            'description' => request('description'),
        ]);

        $addAccess = false;
        if (Gate::allows('change-photosOurClass')) {
            $addAccess = true;
        }

        return redirect()->route('photosOurClass.edit', [$photosOurClass]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhotosOurClass  $photosOurClass
     * @return \Illuminate\Http\Response
     */
    public function show(PhotosOurClass $photosOurClass)
    {
        $deleteAccess = false;
        $changeAccess = false;
        if (Gate::allows('delete-photosOurClass')) {
            $deleteAccess = true;
        }
        if (Gate::allows('change-photosOurClass')) {
            $changeAccess = true;
        }
        return view('photosOurClass.show', compact('photosOurClass','deleteAccess', 'changeAccess'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhotosOurClass  $photosOurClass
     * @return \Illuminate\Http\Response
     */
    public function edit(PhotosOurClass $photosOurClass)
    {
        $deleteAccess = false;
        $changeAccess = false;
        if (Gate::allows('delete-photosOurClass')) {
            $deleteAccess = true;
        }
        if (Gate::allows('change-photosOurClass')) {
            $changeAccess = true;
        }
        return view('photosOurClass.edit', compact('photosOurClass','deleteAccess', 'changeAccess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhotosOurClass  $photosOurClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhotosOurClass $photosOurClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhotosOurClass  $photosOurClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotosOurClass $photosOurClass)
    {
        $photosOurClass->delete();

        return redirect()->route('photosOurClass.index');
    }
}
