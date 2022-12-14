<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\storage;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.extracurriculars.index', [
            'extracurriculars' => Extracurricular::all()
        ]);
    }

    public function indexFE()
    {
        return view('frontend.kesiswaan.extracurriculars', [
            'title' => 'Ekstrakulikuler',
            'extracurriculars' => Extracurricular::latest()->paginate(12)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.extracurriculars.create', [
            'extracurriculars' => Extracurricular::all()
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
            'name' => 'required|max:255',
            'slug' => 'required|unique:extracurriculars',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('extracurricular-images');
        }

        $notifSuccess = array
        (
            'message' => 'Data Ekstrakulikuler Berhasil Ditambah',
            'alert-type' => 'success'
        );

        Extracurricular::create($validatedData);

        return redirect('/admin/extracurriculars')->with($notifSuccess);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function show(Extracurricular $extracurricular)
    {
        $title = 'Detail Informasi Sekolah';
        return view('admin.extracurriculars.show', compact('title'), [
            'extracurricular' => $extracurricular
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function edit(Extracurricular $extracurricular)
    {
        return view('admin.extracurriculars.edit', [
            'extracurricular' => $extracurricular
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Extracurricular $extracurricular)
    {
        $rules = [
            'name' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ];


        if($request->slug != $extracurricular->slug) {
            $rules['slug'] = 'required|unique:extracurriculars';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('extracurricular-images');
        }

        Extracurricular::where('id', $extracurricular->id)
        ->update($validatedData);
        $notifSuccess = array
        (
            'message' => 'Data Ekstrakulikuler Berhasil Diubah',
            'alert-type' => 'success'
        );


        return redirect('/admin/extracurriculars')->with($notifSuccess);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extracurricular $extracurricular)
    {

        if($extracurricular->image) {
            Storage::delete($extracurricular->image);
        }
        Extracurricular::destroy($extracurricular->id);
        $notifSuccess = array
        (
            'message' => 'Data Ekstrakulikuler Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect('/admin/extracurriculars')->with($notifSuccess);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Extracurricular::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
