@extends('layouts.main')
@section('container')
    <section class="galery" id="galery">
        <div class="container">
            <div class="cd-hero ">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="mt-5 text-center">Gallery Photo</h2>
                    </div>
                </div>


                <ul class="cd-hero-slider">

                    <!-- Page 1 Gallery One -->
                    <li class="selected">
                        <div class="cd-full-width">
                            <div class="container-fluid js-tm-page-content" data-page-no="1" data-page-type="gallery">
                                <div class="tm-img-gallery-container">
                                    <div class="tm-img-gallery gallery-one">
                                        <!-- Gallery One pop up connected with JS code below -->
                                        @foreach ($galleries as $gallery)
                                            <div class="grid-item">
                                                <figure class="effect-bubba">
                                                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="Image"
                                                        class="img-fluid tm-img">
                                                    <figcaption>
                                                        <p class="tm-figure-description">{{ $gallery->description }}</p>
                                                        <a href="{{ asset('storage/' . $gallery->image) }}">Lihat</a>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul> <!-- .cd-hero-slider -->

            </div> <!-- .cd-hero -->

            <div class="d-flex justify-content-center mb-3">
                {{ $galleries->links() }}
            </div>
        </div>

    </section>
    <!-- Content -->
    {{-- <div class="cd-hero">


        <ul class="cd-hero-slider">

            <!-- Page 1 Gallery One -->
            <li class="selected">
                <div class="cd-full-width">
                    <div class="container-fluid js-tm-page-content" data-page-no="1" data-page-type="gallery">
                        <div class="tm-img-gallery-container">
                            <div class="tm-img-gallery gallery-one">
                                <!-- Gallery One pop up connected with JS code below -->
                                <div class="tm-img-gallery-info-container">
                                    <h2 class="tm-text-title tm-gallery-title tm-white"><span class="tm-white">Multi Color
                                            Image Gallery</span></h2>
                                    <p class="tm-text">This responsive HTML template includes three gallery pages. Multi
                                        color is designed by Tooplate. You may use this layout for your website.
                                    </p>
                                </div>
                                @foreach ($galleries as $gallery)
                                    <div class="grid-item">
                                        <figure class="effect-bubba">
                                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="Image"
                                                class="img-fluid tm-img">
                                            <figcaption>
                                                <p class="tm-figure-description">{{ $gallery->description }}</p>
                                                <a href="{{ asset('storage/' . $gallery->image) }}">Lihat</a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        </ul> <!-- .cd-hero-slider -->

    </div> <!-- .cd-hero --> --}}
@endsection
