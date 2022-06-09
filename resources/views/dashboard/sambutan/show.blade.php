@extends('dashboard.layouts.main')

@section('container')
    {{-- <div class="row my-3">
        <div class="col-lg-8">
            <h2>Sambutan Kepala Sekolah</h2>
            <div style="max-height: 350px; overflow: hidden;">
                <img src="{{ asset('storage/' . $smbtn->gambar) }}" class="img-fluid mt-3">
            </div>
            
            <article class="my-3 fs-5">
                {!! $smbtn->sambutan !!}
            </article>
        </div>
    </div> --}}

<!-- Default box -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">
                <div class="col-md-8py-5">
                    <img src="{{ asset('storage/' . $smbtn->gambar) }}" class="product-image" alt="Product Image">
                </div>
                <div class="col-md-4 py-5">
                    <h3 class="my-3">Sambutan Kepala Sekolah</h3>
                    <article>
                        {!! $smbtn->sambutan !!}
                    </article>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>


@endsection