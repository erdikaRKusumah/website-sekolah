<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;

class DashboardVisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.visiMisi.index', [
            'visiMisi' => VisiMisi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.visiMisi.create', [
            'visiMisi' => VisiMisi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVisiMisiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'isi' => 'required|max:255',
            'kategori' => 'required|max:10',
            'gambar' => 'image|file|max:1024'
        ]);

        if($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('vision-images');
        }

        VisiMisi::create($validatedData);

        // $visi_misi = VisiMisi::create([
        //     'isi' => $request->isi,
        //     'kategori' => $request->kategori,
        //     'gambar' => $request->file('gambar')->store('vision-images')
        // ]);
        
        return redirect('/dashboard/visiMisi')->with('success', 'New vision and Mission has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function show(VisiMisi $visiMisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function edit(VisiMisi $visiMisi)
    {
        return view('dashboard.visiMisi.edit', [
            'visiMisi' => $visiMisi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVisiMisiRequest  $request
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisiMisi $visiMisi)
    {
        $rules = [
            'isi' => 'required|max:255',
            'kategori' => 'required|max:10',
            'gambar' => 'image|file|max:1024'
        ];
        
        $validatedData = $request->validate($rules);
        
        if($request->file('gambar')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('vision-images');
        }

        VisiMisi::where('id', $visiMisi->id)
                ->update($validatedData);

        // $visiMisi = VisiMisi::where('id', $visiMisi->id)
        //             ->update([
        //                 'isi' => $request->isi,
        //                 'kategori' => $request->kategori,
        //                 'image' => $request->file('image')->store('vision-images')
        //             ]);

        return redirect('/dashboard/visiMisi')->with('success', 'vision has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisiMisi $visiMisi)
    {
        //
    }
}
