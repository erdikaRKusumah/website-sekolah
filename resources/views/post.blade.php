@extends('layouts.main')
@section('container')
<div class="container">
    <article>
        <h2>{{ $post["title"] }}</h2>
        <h5>{{ $post["author"] }}</h5>
        <p>{{ $post["body"] }}</p>
    </article>
    
    <a href="/">Kembali</a>
</div>

@endsection