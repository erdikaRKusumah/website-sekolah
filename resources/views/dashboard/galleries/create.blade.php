@extends('dashboard.layouts.main')

@section('container')

<section>
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Tambah Berita</h1>
        </div>
        <div class="col-sm-6">
        {{-- <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Berita</li>
            <li class="breadcrumb-item active">Edit</li>
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
                    <div class="card-body">
                        <form method="post" action="/dashboard/galleries" class="mb-5" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" required autofocus value="{{ old('description') }}">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Post Image</label>
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Create Gallery</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then( response => response.json())
            .then( data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });

    function previewImage( ) {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector( '.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection
