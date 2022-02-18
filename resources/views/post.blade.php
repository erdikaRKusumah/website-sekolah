@extends('layouts.main')
@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $post->title }}</h2>
            <p>By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a> 
            </p>

            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
            @else
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
            @endif
            
            <article class="my-3 fs-5">
                {!! $post->body !!}

            </article>
            <a href="/posts" class="d-block mt-3">Kembali</a>
            

        </div>
    </div>
</div>
@endsection