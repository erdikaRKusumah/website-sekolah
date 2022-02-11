@extends('layouts.main')
@section('container')

    @foreach ($posts as $post)
    <div class="container">
        <article class="mb-5">
        <h2>
            <a href="/{{ $post->slug }}">{{ $post->title }}</a>
        </h2>
        <h5>By: {{ $post->author }} </h5>
        <p>{{ $post->excerpt }}</p>
        </article>

    </div>
    @endforeach
    <a href="/categories">categories</a>

@endsection