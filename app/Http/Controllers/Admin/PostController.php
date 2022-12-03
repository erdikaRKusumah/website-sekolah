<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\storage;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Informasi Sekolah';
        return view('admin.posts.index', compact('title'), [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
            // 'posts' => Post::all()
        ]);


    }

    public function indexFE()
    {
        $title = '';
        if(request('category')) {
        $category = Category::firstWhere('slug', request('category'));
        $title = ' in ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere( 'username', request('author'));
            $title = ' by '. $author->name;
        }

        return view('frontend.posts', [
            "title" => "All Posts" . $title,
            // "posts" => Post::all()
            "active" => "posts",
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
            "categories" => Category::all()
        ]);
    }

    public function announcements()
    {
        $title = "Pengumuman";
        $announcements = DB::table("posts")->select('body', 'excerpt', 'date', 'title', 'created_at')->where('category_id', 5)->get();
        return view('frontend.announcements', compact('title', 'announcements'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all()
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
            'date' => 'nullable',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);


        Post::create($validatedData);


        // $post = Post::create([
            //     'user_id' => auth()->user()->id,
            //     'excerpt' => Str::limit(strip_tags($request->body), 200),
            //     'title' => $request->title,
            //     'slug' => $request->slug,
            //     'category_id' => $request->category_id,
            //     'image' => $request->file('image')->store('post-images'),
            //     'body' => $request->body
            // ]);

        $notifSuccess = array
        (
            'message' => 'Data Informasi Berhasil Ditambah',
            'alert-type' => 'success'
        );
        return redirect('/admin/posts')->with($notifSuccess);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $title = 'Detail Informasi Sekolah';
        return view('admin.posts.show', compact('title'), [
            'post' => $post
        ]);
            // return $post;
    }

    public function showFE(Post $post)
    {
        return view('frontend.post', [
            "title" => "Single Post",
            "active" => "posts",
            "post" => $post,
            "categories" => Category::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];


        if($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        $notifSuccess = array
        (
            'message' => 'Data Informasi Berhasil Diubah',
            'alert-type' => 'success'
        );

        Post::where('id', $post->id)
        ->update($validatedData);

        // $post = Post::where('id', $post->id)
        //             ->update([
        //                 'user_id' => auth()->user()->id,
        //                 'excerpt' => Str::limit(strip_tags($request->body), 200),
        //                 'title' => $request->title,
        //                 'slug' => $request->slug,
        //                 'category_id' => $request->category_id,
        //                 'image' => $request->file('image')->store('post-images'),
        //                 'body' => $request->body
        //             ]);

        return redirect('/admin/posts')->with($notifSuccess);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image) {
            Storage::delete($post->image);
        }
        $notifSuccess = array
        (
            'message' => 'Data Informasi Berhasil Dihapus',
            'alert-type' => 'success'
        );

        Post::destroy($post->id);
        return redirect('/admin/posts')->with($notifSuccess);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
