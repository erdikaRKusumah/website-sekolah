@extends('layouts.main')
@section('container')

    <div class="container">
        <h1>Post Category : {{ $category }}</h1>
    </div>
    @foreach ($posts as $post)
    <div class="container">
        <article class="mb-5">
        <h2>
            <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>
        </h2>
        <h5>By: {{ $post->author }} </h5>
        <p>{{ $post->excerpt }}</p>
        </article>
    </div>
    @endforeach

@endsection

