<?php

namespace App\Http\Controllers;

use App\Models\SejarahSingkat;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class DashboardSejarahSingkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sejarahSingkat.index', [
            // 'sejarah_singkat' => SejarahSingkat::where('user_id', auth()->user()->id)->get()
            'sejarah_singkat' => SejarahSingkat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sejarahSingkat.create', [
            'sejarah_singkat' => SejarahSingkat::all()
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
            'title' => 'required|max:255',
            'sub_title' => 'required',
            'slug' => 'required|unique:posts',
            'body' => 'required'
        ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        SejarahSingkat::create($validatedData);

        return redirect('/dashboard/sejarahSingkat')->with('success','New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SejarahSingkat  $sejarahSingkat
     * @return \Illuminate\Http\Response
     */
    public function show(SejarahSingkat $sejarahSingkat)
    {
        return view('dashboard.sejarahSingkat.show', [
            'sejarah_singkat' => $sejarahSingkat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SejarahSingkat  $sejarahSingkat
     * @return \Illuminate\Http\Response
     */
    public function edit(SejarahSingkat $sejarahSingkat)
    {
        return view('dashboard.posts.edit', [
            'sejarah_singkat' => $sejarahSingkat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SejarahSingkat  $sejarahSingkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SejarahSingkat $sejarahSingkat)
    {
        $rules = [
            'title' => 'required|max:255',
            'sub_title' => 'required',
            'slug' => 'required|unique:posts',
            'body' => 'required'
        ];

        if($request->slug != $sejarahSingkat->slug) {
            $rules['slug'] = 'required|unique:sejarah_singkat'; 
        }

        $validateData = $request->validate($rules);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        SejarahSingkat::where('id', $sejarahSingkat->id)
        ->update($validatedData);

        return redirect('/dashboard/sejarahSingkat')->with('success', 'Sejarah singkat has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SejarahSingkat  $sejarahSingkat
     * @return \Illuminate\Http\Response
     */
    public function destroy(SejarahSingkat $sejarahSingkat)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->sub_title);
        return response()->json(['slug' => $slug]);
    }
}
