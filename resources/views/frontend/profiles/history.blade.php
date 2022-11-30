@extends('layouts.mainProfile')
@section('container')
    <div class="row">
        <div class="col-md-12 text-center mb-5">
            <img src="{{ asset('storage/' . $sejarah->image) }}" class="img-fluid about-img" alt="#">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h3>Sejarah Singkat Sekolah</h3>
            <p>{!! $sejarah->body !!}</p>
        </div>
    </div>
    </div>
    </section>

    </section>
@endsection
