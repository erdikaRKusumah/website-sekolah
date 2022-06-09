<?php

namespace App\Http\Controllers;

use App\Models\Sambutan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\storage;

class DashboardSambutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sambutan.index', [
            // 'sambutan' => Sambutan::where('user_id', auth()->user()->id)->get()
            'sambutan' => Sambutan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sambutan.create', [
            'sambutan' => Sambutan::all()
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
            'sambutan' => 'required',
            'gambar' => 'image|file|max:1024'
        ]);

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-sambutan');
        }

        $validatedData['kutipan'] = Str::limit(strip_tags($request->sambutan), 100);

        Sambutan::create($validatedData);

        return redirect('/dashboard/sambutan')->with('success','New sambutan has been added!');

        // $validateData = $request->validate([
        //     'sambutan' => 'required|max:255',
        //     'gambar' => 'image|file|max:1024'
        // ]);

        // if($request->file('gambar')) {
        //     $validatedData['gambar'] = $request->file('gambar')->store('gambar-sambutan');
        // }

        // $sambutan = Sambutan::create([
        //     'sambutan' => $request->sambutan,
        //     'kutipan' => Str::limit(strip_tags($request->sambutan), 100),
        //     'gambar' => $request->file('gambar')->store('gambar-sambutan')
        // ]);
        
        // return redirect('/dashboard/sambutan')->with('success', 'New sambutan has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sambutan  $sambutan
     * @return \Illuminate\Http\Response
     */
    public function show(Sambutan $sambutan)
    {
        return view('dashboard.sambutan.show', [
            'smbtn' => $sambutan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sambutan  $sambutan
     * @return \Illuminate\Http\Response
     */
    public function edit(Sambutan $sambutan)
    {
        return view('dashboard.sambutan.edit', [
            'smbtn' => $sambutan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sambutan  $sambutan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sambutan $sambutan)
    {
        $rules = [
            'sambutan' => 'required',
            'gambar' => 'image|file|max:1024'
        ];

        // if($request->id != $sambutan->id){
        //     $rules['id']='required|unique:sambutan';
        // }

        $validatedData = $request->validate($rules);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-sambutan');
        }

        $validatedData['kutipan'] = Str::limit(strip_tags($request->sambutan), 100);

        Sambutan::where('id', $sambutan->id)
        ->update($validatedData);

        return redirect('/dashboard/sambutan')->with('success','Sambutan has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sambutan  $sambutan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sambutan $sambutan)
    {
        //
    }
}
