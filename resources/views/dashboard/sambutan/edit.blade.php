@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Sambutan</h1>
            </div>

            <div class="col-lg-8">
                <form method="post" action="/dashboard/sambutan/{{ $smbtn->id }}" class="mb-5" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Sambutan</label>
                        <input type="hidden" name="oldImage" value="{{ $smbtn->gambar }}">
                        @if($smbtn->gambar)
                            <img src="{{ asset('storage/' . $smbtn->gambar) }}" class="img-preview img-fluid mb-3 col-sm-5">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" onchange="previewImage()">
                        @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sambutan" class="form-label">Sambutan</label>
                        @error('sambutan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="sambutan" type="hidden" name="sambutan" value="{{ old('sambutan', $smbtn->sambutan )}}">
                        <trix-editor input="sambutan"></trix-editor>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Sambutan</button>
                </form>
            </div>
</div>

<script>
    // const title = document.querySelector('#title');
    // const slug = document.querySelector('#slug');

    // title.addEventListener('change', function() {
    //     fetch('/dashboard/posts/checkSlug?title=' + title.value)
    //         .then( response => response.json())
    //         .then( data => slug.value = data.slug) 
    // });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });

    function previewImage( ) {
        const image = document.querySelector('#gambar');
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