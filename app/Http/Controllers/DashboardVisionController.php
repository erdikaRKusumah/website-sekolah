<?php

namespace App\Http\Controllers;

use App\Models\Vision;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\storage;

class DashboardVisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.visions.index', [
            'visions' => Vision::all()
            // 'visions' => vision::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.visions.create', [
            'visions' => Vision::all()
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
        $validateData = $request->validate([
            'vision' => 'required|max:255',
            'mision' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('vision-images');
        }

        $vision = vision::create([
            'vision' => $request->vision,
            'mision' => $request->mision,
            'image' => $request->file('image')->store('vision-images')
        ]);
        
        return redirect('/dashboard/visions')->with('success', 'New vision has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function show(Vision $vision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function edit(Vision $vision)
    {
        return view('dashboard.visions.edit', [
            'vision' => $vision
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vision $vision)
    {
        $rules = [
            'vision' => 'required|max:255',
            'mision' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ];
        
        $validateData = $request->validate($rules);
        
        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('vision-images');
        }

        $vision = Vision::where('id', $vision->id)
                    ->update([
                        'vision' => $request->vision,
                        'mision' => $request->mision,
                        'image' => $request->file('image')->store('vision-images')
                    ]);

        return redirect('/dashboard/visions')->with('success', 'vision has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vision $vision)
    {
      //
    }
}
