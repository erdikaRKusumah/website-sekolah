@extends('layouts.main')
@section('container')
    <section>
        <div
            style="background: url(../assets/slider3.png) no-repeat;
    -webkit-background-size: cover;
    background-size: cover;
    padding: 97px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center title">
                        <h1>SMPN 1 Cilamaya Wetan</h1>
                        <p>Sambutan Kepala Sekolah</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="ml-4"><a href="/" style="text-decoration: none;">HOME</a> / SAMBUTAN</p>
                        <hr class="light">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mb-5">
                        <img src="{{ asset('storage/' . $sambutan->image) }}" class="img-fluid about-img" alt="#">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <h3>Sambutan Kepala Sekolah</h3>
                        <p>{!! $sambutan->body !!}</p>
                    </div>
                </div>
            </div>
        </section>

    </section>
@endsection
