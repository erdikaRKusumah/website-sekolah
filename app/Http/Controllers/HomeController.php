<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Kelas;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $visi = DB::table("profiles")->select('body')->where('title', 'Visi')->first();
        $misi = DB::table("profiles")->select('excerpt')->where('title', 'Misi')->first();
        $sambutan = DB::table("profiles")->select('body', 'image')->where('title', 'Sambutan Singkat')->first();
        $sejarahSingkat = DB::table("profiles")->select('body', 'image')->where('title', 'Sejarah Singkat')->first();
        $title = '';
        $announcements = DB::table("posts")->select('slug', 'body', 'excerpt', 'created_at', 'title')->where('category_id', 5)->get();
        $agendas = DB::table("posts")->select('slug', 'body', 'excerpt', 'date', 'title')->where('category_id', 4)->get();

        $jumlah_guru = Teacher::all()->count();
        $jumlah_siswa = Student::where('status', 1)->count();
        $jumlah_kelas = Kelas::all()->count();
        if(request('category')) {
        $category = Category::firstWhere('slug', request('category'));
        $title = ' in ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere( 'username', request('author'));
            $title = ' by '. $author->name;
        }

        return view('frontend.home', compact('visi', 'misi', 'sambutan', 'sejarahSingkat', 'jumlah_guru', 'jumlah_siswa', 'jumlah_kelas', 'announcements', 'agendas'), [
            "title" => "Home" . $title,
            // "posts" => Post::all()
            "home" => "active",
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(4)->withQueryString(),
            "galleries" => Gallery::latest()->paginate(8)
        ]);

    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => "posts",
            "post" => $post
        ]);
    }

    public function events()
    {
        $category = Category::get('category_id');
        $announcements = Post::where('category_id', $category)->first();




        $fsfsf = DB::table("posts")->select('category', 'title', 'created_at', 'excerpt')->where('category', 'Pengumuman')->first();
        $agendas = DB::table("posts")->select('category', 'title', 'created_at', 'excerpt')->where('category', 'Agenda')->first();
    }
}
