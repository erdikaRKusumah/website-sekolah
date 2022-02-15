@extends('dashboard.layouts.main')

@section('container')
    <div class="row my-3">
        <div class="col-lg-8">
            <h2>{{ $post->title }}</h2>

            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my posts</a>
            <a href="" class="btn btn-warning"><span data-feather="edit"></span> edit</a>
            <a href="" class="btn btn-danger"><span data-feather="x-circle"></span> delete</a>
            
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
            
            <article class="my-3 fs-5">
                {!! $post->body !!}

            </article>
            <a href="/posts" class="d-block mt-3">Kembali</a>
            

        </div>
    </div>


@endsection