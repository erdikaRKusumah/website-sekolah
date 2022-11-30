@extends('admin.layouts.main')

@section('container')
@section('posts', 'active')
@section('berita', 'active')
@section('main', 'menu-is-opening menu-open')
<section>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                {{-- <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Berita</li>
                <li class="breadcrumb-item active">Show</li>
            </ol> --}}
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h1 class="mt-3 ml-3">{{ $post->title }}</h1>
                    <div class="card-body">
                        @if ($post->image)
                            <div style="max-height: 350px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                    class="img-fluid mt-3">
                            </div>
                        @else
                            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                                alt="{{ $post->category->name }}" class="img-fluid mt-3">
                        @endif

                        <article class="my-3 fs-5">
                            {!! $post->body !!}

                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
