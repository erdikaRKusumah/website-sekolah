@extends('layouts.main')
@section('container')
    <section class="galery" id="galery">
        <div class="container">
            <div class="cd-hero ">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="mt-5 text-center">Ekstrakulikuler</h2>
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
                                        @foreach ($extracurriculars as $extracurricular)
                                            <div class="grid-item">
                                                <figure class="effect-bubba">
                                                    <img src="{{ asset('storage/' . $extracurricular->image) }}"
                                                        alt="Image" class="img-fluid tm-img">
                                                    <figcaption>
                                                        <p class="tm-figure-description">{{ $extracurricular->name }}
                                                        </p>
                                                        <a
                                                            href="{{ asset('storage/' . $extracurricular->image) }}">Lihat</a>
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
                {{ $extracurriculars->links() }}
            </div>
        </div>

    </section>
@endsection
