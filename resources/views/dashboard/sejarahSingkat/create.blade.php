@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Sejarah Singkat</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/sejarahSingkat" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sub_title" class="form-label">Sub Judul</label>
            <input type="text" class="form-control @error('sub_title') is-invalid @enderror" id="sub_title" name="sub_title" required autofocus value="{{ old('sub_title') }}">
            @error('sub_title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body')}}">
            <trix-editor input="body"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<script>
    const title = document.querySelector('#sub_title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/sejarahSingkat/checkSlug?title=' + title.value)
            .then( response => response.json())
            .then( data => slug.value = data.slug) 
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });
</script>

@endsection