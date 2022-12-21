@extends('layouts.main')
@section('container')
    {{-- imageSlider --}}
    <section>
        <div class="slider_img layout_two">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block" src="{{ asset('assets') }}/slider1.png" alt="First slide">
                        <div class="carousel-caption d-md-block">
                            <div class="slider_title">
                                <h1>Bepikir Kreatif &amp; Inovatif</h1>
                                <h4>Bagi kami kreativitas merupakan gerbang masa depan.<br> kreativitas akan mendorong
                                    inovasi. <br> Itulah yang kami lakukan.</h4>
                                <div class="slider-btn">
                                    <a href="" class="btn btn-default">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="{{ asset('assets') }}/slider2.png" alt="Second slide">
                        <div class="carousel-caption d-md-block">
                            <div class="slider_title">
                                <h1>Guru Bekualitas Tinggi</h1>
                                <h4>Guru merupakan faktor penting dalam proses belajar-mengajar.<br> Itulah kenapa kami
                                    mendatangkan guru-guru <br>terbaik dari berbagai penjuru.</h4>
                                <div class="slider-btn">
                                    <a href="" class="btn btn-default">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="{{ asset('assets') }}/slider3.png" alt="Third slide">
                        <div class="carousel-caption d-md-block">
                            <div class="slider_title">
                                <h1>Proses Belajar Interatif</h1>
                                <h4>Kami membuat proses belajar mengajar menjadi lebih interatif.<br> dengan demikian siswa
                                    lebih menyukai <br>proses belajar.</h4>
                                <div class="slider-btn">
                                    <a href="" class="btn btn-default">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <i class='bx bx-chevron-left fa-slider' aria-hidden="true"></i>

                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <i class='bx bx-chevron-right fa-slider' aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <section class="clearfix about about-style2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5" style="font-weight: bold;">Selamat Datang</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $sambutan->image) }}" class="img-fluid about-img" alt="#">
                </div>
                <div class="col-md-8">
                    <h2>SAMBUTAN SINGKAT</h2>
                    <p>{!! $sambutan->excerpt !!}</p>
                    <a href="/greeting" class="btn btn-default">Selengkapnya..</a>
                </div>
            </div>
        </div>
    </section>

    <section class="vision">
        <div class="container-md">
            <div class="row text-center padding shadow m-5">
                <div class="col-lg-4 offset-lg-2 col-md-5 offset-md-1">
                    {{-- @foreach ($profiles as $profile) --}}
                    <div class="col visi">
                        <i class='bx bxs-book-reader'></i>
                        {{-- <i class="fa-solid fa-book-open-reader"></i> --}}
                        <h3>VISI</h3>
                    </div>
                    {{-- <img src="{{ asset('assets')}}/br.png" alt=""> --}}
                    <p>{!! $visi->body !!}</p>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="col visi">
                        <i class='bx bxs-book-reader'></i>
                        <h3>MISI</h3>
                    </div>
                    {{-- <img src="{{ asset('assets')}}/br.png" alt=""> --}}
                    <p>{!! $misi->excerpt !!}</p>
                    <a href="/visionMision" class="btn btn-default">Selengkapnya..</a>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </section>

    <section class="history">
        <div class="container">
            <div class="row prow text-white" style="font-size: 17px;">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 content">
                    <div class="flexbox-item">
                        <h2>Sejarah Singkat</h2>
                        <p>SMPN 1 Cilamaya Wetan</p>
                        {!! $sejarahSingkat->excerpt !!}
                        <a href="/history" class="btn btn-history mt-4">Selengkapnya..</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 gambar"><img
                        src="{{ asset('storage/' . $sejarahSingkat->image) }}" alt="Image" class="img-fluid"></div>
            </div>
        </div>
    </section>
    <section class="galery" id="galery">
        <div class="container">
            <div class="cd-hero ">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="mt-5">Galeri</h2>
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
                                    <div class="text-center">
                                        <a href="/galleries" class="btn btn-default mb-5 mt-3">Selengkapnya..</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul> <!-- .cd-hero-slider -->

            </div> <!-- .cd-hero -->

        </div>

    </section>


    <section class="our_courses" style="background: #f2f2f2;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Berita Terbaru</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="courses_box mb-4">
                            <div class="course-img-wrap">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                    class="img-fluid">
                            </div>
                            <!-- // end .course-img-wrap -->
                            <a href="/post/{{ $post->slug }}" class="course-box-content">
                                <h4 style="text-align:center;">{{ $post->title }}</h4>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div> <br>
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <a href="/posts" class="btn btn-default btn-courses">Selengkapnya...</a>
                </div>
            </div>
        </div>
    </section>
    {{-- end  --}}
    {{-- two column  --}}
    <section class="event">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="event-img2">
                        @foreach ($announcements as $announcement)
                            <div class="row">
                                <div class="col-sm-3"> <img src="{{ asset('assets') }}/announcement-icon.png"
                                        class="img-fluid" alt="event-img">
                                </div><!-- // end .col-sm-3 -->
                                <div class="col-sm-9">
                                    <h4><a href="/announcements" class="event-a">{{ $announcement->title }}</a></h4>
                                    <span>{{ date('d/m/y', strtotime($announcement->created_at)) }}</span>
                                    <p>{{ $announcement->excerpt }}</p>

                                </div><!-- // end .col-sm-7 -->
                            </div><!-- // end .row -->
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($agendas as $agenda)
                                <div class="event_date">
                                    <div class="event-date-wrap">
                                        <p>{{ date('d', strtotime($agenda->date)) }}</p>
                                        <span>{{ date('M. y', strtotime($agenda->date)) }}</span>
                                    </div>
                                </div>
                                <div class="date-description">
                                    <h4><a href="/agendas">{{ $agenda->title }}</a></h4>
                                    <p>{{ $agenda->excerpt }}</p>
                                    <hr class="event_line">
                                </div>
                            @endforeach


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="detailed-chart">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 offset-2 chart_bottom">
                    <div class="chart-img">
                        <img src="{{ asset('assets') }}/chart-icon_1.png" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter" data-val="{{ $jumlah_guru }}">0</span> Guru
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom chart_top">
                    <div class="chart-img">
                        <img src="{{ asset('assets') }}/chart-icon_2.png" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter" data-val="{{ $jumlah_siswa }}">0</span> Siswa
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 chart_top">
                    <div class="chart-img">
                        <img src="{{ asset('assets') }}/chart-icon_3.png" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter" data-val="{{ $jumlah_kelas }}">0</span> Kelas
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end tc  --}}
    {{-- social media --}}
    {{-- <div class="container-fluid padding">
        <div class="row text-center padding">
            <div class="col-12">
                <h2>Connect</h2>
            </div>
            <div class="col-12 social padding">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div> --}}
    {{-- end social media --}}
    {{-- footer  --}}
    {{-- end footer  --}}
    <!-- Akhir Hero -->
    <!-- Awal Sambutan -->
    {{-- <div class="sambutan container">
        <div class="row my-5">
            <div class="col">
                <img src="/assets/kepsek.png" class="d-block width-100" alt="Product Image">

            </div>
            <div class="col">
            @foreach ($sambutan as $smbtn)
                <h4>Selamat Datang</h4>
                <H2>Sambutan Kepala Sekolah</H2>
                <p>{!! $smbtn->sambutan !!}</p>
                <button type="button" class="btn btn-outline-secondary">Secondary</button>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Akhir Sambutan -->
    <!-- Awal Pengumuman -->

    <div class="pengumuman container">
        <div class="row my-5">
            <div class="col-10">
                <h4>Pengumuman</h4>
            </div>
            <div class="col">
                <>
            </div>
        </div>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col">
                <div class="card">
                    <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <!-- Akhir Pengumuman -->
    <div class="kegiatan berita my-5 p-5 bg-light">
        <!-- Awal Kegiatan -->
        <div class="row">
            <div class="col-10">
                <h4>Kegiatan Mendatang</h4>
                <h2>Acara/ Kegiatan</h2>
            </div>
            <div class="col">
                <button type="button" class="btn btn-outline-secondary">Selangkapnya</button>
            </div>
        </div>
        <div class="row p-5">
            <div class="col">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/assets/pengumuman-img.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8 m-auto">
                            <div class="card-body">
                                <h2 class="card-title">Perayaan acara ulang tahun sekolah tahun ajaran 22</h2>
                                <div class="row">
                                    <div class="col">Date</div>
                                    <div class="col">Time</div>
                                    <div class="col">Place</div>
                                </div>
                                <p class="card-text">Perayaan acara ulang tahun sekolah tahun ajaran 22 akan
                                    diselengarakan pada tanggal sekian jam sekian di sekolah dan menggunakan baju
                                    yang sudah ditentukan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir kegiatan -->
        <!-- Awal Berita -->
        <div class="berita">
            <div class="row my-5">
                <div class="col-10">
                    <h4>Berita</h4>
                </div>
                <div class="col">
                    <>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <img src="/assets/pengumuman-img.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make
                                up the bulk
                                of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="/assets/pengumuman-img.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make
                                up the bulk
                                of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="/assets/pengumuman-img.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make
                                up the bulk
                                of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Berita -->

    <!-- Awal Gallery -->
    <div class="gallery my-5 container">
        <h4>Galley</h4>
        <div class="row my-3">
            <div class="col">
                <img src="/assets/pengumuman-img.jpg" class="card-img-top" alt="...">
            </div>
            <div class="col">
                <img src="/assets/pengumuman-img.jpg" class="card-img-top" alt="...">
            </div>
            <div class="col">
                <img src="/assets/pengumuman-img.jpg" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <img src="/assets/pengumuman-img.jpg" class="card-img-top" alt="...">
            </div>
            <div class="col">
                <img src="/assets/pengumuman-img.jpg" class="card-img-top" alt="...">
            </div>
            <div class="col">
                <img src="/assets/pengumuman-img.jpg" class="card-img-top" alt="...">
            </div>
        </div>

    </div>
    <!-- Akhir Gallery -->
    <!-- Awal Tentang Kami -->
    <!-- Awal Sambutan -->
    <div class="tentangKami container">
        <h4>Tentang Kami</h4>
        <div class="row my-5 m-5">
            <div class="col">
                <img src="/assets/tentangKami-img.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="col ">
                <H2>Tentang kami</H2>
                <p>SMPN 1 Cilamaya Wetan adalah Sekolah Menengah Pertama (SMP) Negeri yang berlokasi di Propinsi
                    Jawa Barat Kabupaten Kab. Kerawang dengan alamat Jl. Raya Cilamaya Cilamaya Wetan-karawang.
                    SMPN 1 Cilamaya Wetan adalah Sekolah Menengah Pertama (SMP) Negeri yang berlokasi di
                    Propinsi Jawa Barat Kabupaten Kab. Kerawang dengan alamat Jl. Raya Cilamaya Cilamaya
                    Wetan-karawang.SMPN 1 Cilamaya Wetan adalah Sekolah Menengah Pertama (SMP) Negeri yang
                    berlokasi di Propinsi Jawa Barat Kabupaten Kab. Kerawang dengan alamat Jl. Raya Cilamaya
                    Cilamaya.</p>
                <button type="button" class="btn btn-outline-secondary">Selengkapnya</button>
            </div>
        </div>
    </div>
    <!-- Akhir Sambutan -->
    <!-- Akhir Tentang Kami -->

    <div class="footer m-5">
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col-1 m-1">
                        <img src=" /assets/logo.png" class="d-block w-15" alt="...">
                    </div>
                    <div class="col my-auto">
                        <h2>SMP N 1 CILAMAYA WETAN</h2>
                        <h4>AKREDITASI A</h4>
                    </div>
                </div>
                <p>SMPN 1 Cilamaya Wetan adalah Sekolah Menengah Pertama (SMP) Negeri yang berlokasi di Propinsi
                    Jawa Barat Kabupaten Kab. Kerawang dengan alamat Jl. Raya Cilamaya Cilamaya Wetan-karawang.</p>
                <h4>Kontak Kami</h4>
                <p>Nomor Anda 0123xxxxxx</p>
                <p>smpn1cilamaya@gmail.com</p>

            </div>
            <div class="col">
                <img src="/assets/pengumuman-img.jpg" class="d-block w-15" alt="...">
                <p>Copyright - 2022 Erdika Rhamadan Kusumah</p>
            </div>
        </div>
    </div> --}}
@endsection
