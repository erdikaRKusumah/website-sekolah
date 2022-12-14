@extends('layouts.mainProfile')
@section('container')
    <div class="row">
        <div class="col-md-6">
            <h3 class="mt-5">Visi Sekolah</h3>
            <p>{!! $visi->body !!}</p>
        </div>
        <div class="col-md-6 mb-5">
            <img src="{{ asset('storage/' . $visi->image) }}" class="img-fluid about-img" alt="#">

        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $misi->image) }}" class="img-fluid about-img" alt="#">
        </div>
        <div class="col-md-6">
            <h3>Misi Sekolah</h3>
            <p>{!! $misi->body !!}</p>
        </div>
    </div>
    </div>
    </section>
@endsection
