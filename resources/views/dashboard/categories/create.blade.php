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
                        <form method="post" action="/dashboard/categories" class="mb-5" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                                @error('name')
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
                            <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function() {
        fetch('/dashboard/categories/checkSlug?name=' + name.value)
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