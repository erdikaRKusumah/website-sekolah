<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\storage;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.galleries.index', [
            'galleries' => Gallery::all()
        ]);
    }

    public function indexFE()
    {
        return view('frontend.galleries', [
            'title' => 'Galeri',
            'galleries' => Gallery::latest()->paginate(12)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleries.create', [
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

        $notifSuccess = array
        (
            'message' => 'Data Galeri Berhasil Ditambah',
            'alert-type' => 'success'
        );

        Gallery::create($validatedData);

        return redirect('/admin/galleries')->with($notifSuccess);
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
        return view('admin.galleries.edit', [
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

        $rules = [
            'description' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('gallery-images');
        }

        Gallery::where('id', $gallery->id)
        ->update($validatedData);

        $notifSuccess = array
        (
            'message' => 'Data Galeri Berhasil Diubah',
            'alert-type' => 'success'
        );

        return redirect('/admin/galleries')->with($notifSuccess);

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
        $notifSuccess = array
        (
            'message' => 'Data Galeri Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect('/admin/galleries')->with($notifSuccess);
    }
}
