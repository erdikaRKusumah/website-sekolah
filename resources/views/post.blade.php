@extends('layouts.main')
@section('container')
<div class="container">
    <article>
        <h2>{{ $post->title }}</h2>
        
        <p>By. Erdika ganteng in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a> 
        </p>

        {!! $post->body !!}
    </article>
    
    <a href="/posts">Kembali</a>
</div>

@endsection