@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/sambutan" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Sambutan</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" onchange="previewgambar()">
            @error('gambar')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sambutan" class="form-label">sambutan</label>
            @error('sambutan')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="sambutan" type="hidden" name="sambutan" value="{{ old('sambutan')}}">
            <trix-editor input="sambutan"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Create Sambutan</button>
    </form>
</div>

<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });

    function previewImage( ) {
        const image = document.querySelector('#gambar');
        const imgPreview = document.querySelector( '.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection