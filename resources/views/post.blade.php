@extends('layouts.main')
@section('container')
<div class="container">
    <article>
        <h2>{{ $post->title }}</h2>
        
        {!! $post->body !!}
    </article>
    
    <a href="/">Kembali</a>
</div>

@endsection