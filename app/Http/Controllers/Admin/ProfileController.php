<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Kelas;
use App\Models\Tapel;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Profil Sekolah';
        return view('admin.profiles.index', compact('title'), [
            'profiles' => Profile::all()
        ]);
    }

    public function visionMision()
    {
        $visi = DB::table("profiles")->select('body', 'image')->where('title', 'Visi')->first();
        $misi = DB::table("profiles")->select('body', 'image')->where('title', 'Misi')->first();
        return view('frontend.profiles.visionMision', compact('visi', 'misi'), [
            'title' => 'Visi dan Misi',
            'profile' => 'active',
        ]);
    }

    public function greeting()
    {
        $sambutan = DB::table("profiles")->select('body', 'image')->where('title', 'Sambutan Singkat')->first();
        return view('frontend.profiles.greeting', compact('sambutan'), [
            'title' => 'Sambutan Kepala Sekolah',
            'profile' => 'active',
        ]);
    }

    public function history()
    {
        $sejarah = DB::table("profiles")->select('body', 'image')->where('title', 'Sejarah Singkat')->first();
        return view('frontend.profiles.history', compact('sejarah'), [
            'title' => 'Sejarah Singkat',
            'profile' => 'active',
        ]);
    }

    public function structure()
    {
        $struktur = DB::table("profiles")->select('image')->where('title', 'Struktur Organisasi')->first();
        return view('frontend.profiles.structure', compact('struktur'), [
            'title' => 'Struktur Organisasi',
            'profile' => 'active',
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Profile $profile)
    {
        return view('admin.profiles.create', [
            'profile' => $profile
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
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('profile-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);


        Profile::create($validatedData);
        $notifSuccess = array
        (
            'message' => 'Data Profile Berhasil Ditambah',
            'alert-type' => 'success'
        );
        return redirect('/admin/profiles')->with($notifSuccess);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $title = 'Detail Profile Sekolah';
        return view('admin.profiles.show', compact('title'), [
            'profile' => $profile
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('admin.profiles.edit', [
            'profile' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];


        if($request->slug != $profile->slug) {
            $rules['slug'] = 'required|unique:profiles';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('profile-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);


        Profile::where('id', $profile->id)
        ->update($validatedData);
        $notifSuccess = array
        (
            'message' => 'Data Profile Berhasil Diubah',
            'alert-type' => 'success'
        );
        return redirect('/admin/profiles')->with($notifSuccess);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        if($profile->image) {
            Storage::delete($profile->image);
        }


        Profile::destroy($profile->id);
        $notifSuccess = array
        (
            'message' => 'Data Profile Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect('/admin/profiles')->with($notifSuccess);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Profile::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
