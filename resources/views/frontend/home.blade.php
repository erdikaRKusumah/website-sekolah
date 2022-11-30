@extends('layouts.main')
@section('container')
    {{-- <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/assets/bulding.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1 style="padding-left: 100px;">First slide label</h1>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/assets/bulding.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/assets/bulding.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div> --}}

    <!-- Awal Hero -->
    {{-- <div class="hero">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                    class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/assets/bulding.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/assets/hero.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/assets/hero.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div> --}}
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
                                <h1>Bepikir Kreaftif &amp; Inovatif</h1>
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
    {{-- <div id="slides" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/assets/sekolah1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h3 class="display-2">Selamat Datang di Website</h3>
                    <h1>SMPN 1 CILAMAYA WETAN</h1>
                    <p class="lead">Tutorial framework website dalam bahasa Indonesia</p>
                    <button type="button" class="btn btn-outline-light btn-lg">Selengkapnya</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/assets/bulding.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
    </div> --}}
    {{-- akhir imageSlider --}}
    {{-- jumbotron --}}
    {{-- <div class="container-fluid">
        <div class="row jumbotron">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                <p class="lead">A web hosting service allows individuals and organization to make their website accessible via the world wide web.</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                <a href="#"><button type="button" class="btn btn-outline-secondary btn-lg">Web Hosting</button></a>
            </div>

        </div>
    </div> --}}
    {{-- akhir jumbotron --}}
    {{-- two column  --}}
    {{-- <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-lg-4 offset-lg-2 col-md-5 offset-md-1 text-center kepsek">
                <img src="/assets/kepsek.png" alt="">
                <p>Ida Rohidayati, S.Pd, M.Pd.</p>
                <p>Kepala Sekolah</p>
            </div>
            <div class="col-lg-4 col-md-5">
                <h2>Assalamualaikum Wr.Wb</h2>
                <p>Puji syukur kepada Alloh SWT, Tuhan Yang Maha Esa yang telah memberikan rahmat dan anugerahNya sehingga website SMK Negeri 2 Yogyakarta ini dapat terbit. </p>
                <p>Salah satu tujuan dari website ini adalah untuk menjawab akan setiap kebutuhan informasi dengan memanfaatkan sarana teknologi informasi yang ada. Kami sadar sepenuhnya dalam rangka memajukan pendidikan di era berkembangnya Teknologi Informasi yang begitu pesat, sangat diperlukan berbagai sarana prasarana yang kondusif, kebutuhan berbagai informasi siswa, guru, orangtua maupun masyarakat, sehingga kami berusaha mewujudkan hal tersebut semaksimal mungkin.</p>
                <p>Semoga dengan adanya website ini dapat membantu dan bermanfaat, terutama informasi yang berhubungan dengan pendidikan, ilmu pengetahuan dan informasi seputar SMPN 1 Cilamaya Wetan.</p>
                <a href="#" class="btn btn-primary">Selengkapnya..</a>
            </div>
        </div>
    </div> --}}
    <section class="clearfix about about-style2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Selamat Datang</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $sambutan->image) }}" class="img-fluid about-img" alt="#">
                </div>
                <div class="col-md-8">
                    <h2>SAMBUTAN SINGKAT</h2>
                    <p>{!! $sambutan->body !!}</p>
                    <a href="/greeting" class="btn btn-default">Selengkapnya..</a>
                </div>
            </div>
        </div>
    </section>
    {{-- end tc  --}}
    {{-- welcome section --}}
    {{-- <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">
                    Built with ease.
                </h1>
            </div>
            <hr>
            <div class="col-12">
                <p class="lead">
                    Welcome to my Bootstrap 4 website tutorial! Bootstrap is a free and open-source front-end library with HTML and CSS based design.
                </p>
            </div>
        </div>
    </div> --}}
    {{-- end ws --}}
    {{-- three column sectio --}}
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
                {{-- <div class="col-xs-12 col-md-4">
                    <i class="fab fa-css3"></i>
                    <h3>BOOTSTRAP</h3>
                    <p>Built with the latest version of CSS, CSS 3</p>
                </div> --}}
            </div>
        </div>

    </section>

    <section class="history">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="mt-5">Sejarah Singkat</h2>
                    <p>SMPN 1 Cilamaya Wetan</p>
                    <p style="color: white !important;">{!! $sejarahSingkat->body !!}</p>
                    <a href="/history" class="btn btn-history mb-5">Selengkapnya..</a>

                </div>
                <div class="col-md-4">
                    <div class="kotakk">

                    </div>
                    <img src="{{ asset('storage/' . $sejarahSingkat->image) }}" class="img-fluid about-img text-center"
                        alt="#">
                </div>
            </div>
        </div>
    </section>

    <section class="galery" id="galery">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <h2 class="mt-5">Galeri</h2>
                </div>
            </div>

            <div class="row">
                @foreach ($galleries as $gallery)
                    {{-- <div class="galery"> --}}
                    {{-- <div> --}}
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="" class="img-fluid col-lg-4 mb-5">
                @endforeach
            </div>
        </div>

    </section>

    {{-- <section class="our_courses" style="background: #f2f2f2;">
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
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                        class="img-fluid">
                                @else
                                    <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}"
                                        class="card-img-top" alt="{{ $post->category->name }}">
                                @endif
                            </div>
                            <!-- // end .course-img-wrap -->
                            <a href="/post/{{ $post->slug }}" class="course-box-content">
                                <h3 style="text-align:center;">{{ $post->title }}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div> <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="/posts" class="btn btn-default btn-courses">View More</a>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- end  --}}
    {{-- two column  --}}
    {{-- <section class="event">
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
                                    <h3><a href="{{ $announcement->id }}">{{ $announcement->title }}</a></h3>
                                    <span>{{ $announcement->date }}</span>
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
                                        <p>{{ date('d', strtotime($agenda->date)) }} ?></p>
                                        <span>{{ date('M. y', strtotime($agenda->date)) }}</span>
                                    </div>
                                </div>
                                <div class="date-description">
                                    <h3><a href="{{ $agenda->id }}">{{ $agenda->title }}</a></h3>
                                    <p>{{ $agenda->excerpt }}</p>
                                    <hr class="event_line">
                                </div>
                            @endforeach


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> --}}

    <div class="detailed-chart">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 offset-2 chart_bottom">
                    <div class="chart-img">
                        <img src="{{ asset('assets') }}/chart-icon_1.png" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter">{{ $jumlah_guru }}</span> Guru
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom chart_top">
                    <div class="chart-img">
                        <img src="{{ asset('assets') }}/chart-icon_2.png" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter">{{ $jumlah_siswa }}</span> Siswa
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 chart_top">
                    <div class="chart-img">
                        <img src="{{ asset('assets') }}/chart-icon_3.png" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter">{{ $jumlah_kelas }}</span> Kelas
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
