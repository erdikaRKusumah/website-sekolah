<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\storage;


class DashboardGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.galleries.index', [
            'galleries' => Gallery::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.galleries.create', [
            'galleries' => Gallery::all()
        ]);
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
            'description' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('gallery-images');
        }

        Gallery::create($validatedData);

        return redirect('/dashboard/galleries')->with('success', 'New gallery has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('dashboard.galleries.edit', [
            'gallery' => $gallery
        ]);
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
        $gallery->update($request->all());
        return redirect()->route('/dashboard/galleries')->with('success','Data berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if($gallery->image) {
            Storage::delete($gallery->image);
        }
        Gallery::destroy($gallery->id);
        return redirect('/dashboard/galleries')->with('success', 'Gallery has been deleted!');
    }
}
