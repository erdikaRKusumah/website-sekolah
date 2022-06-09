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
    <div id="slides" class="carousel slide" data-ride="carousel">
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
            {{-- <div class="carousel-item">
                <img src="/assets/bulding.jpg" class="d-block w-100" alt="...">
            </div> --}}
        </div>
    </div>
    {{-- akhir imageSlider --}}
    {{-- jumbotron --}}
    <div class="container-fluid">
        <div class="row jumbotron">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                <p class="lead">A web hosting service allows individuals and organization to make their website accessible via the world wide web.</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                <a href="#"><button type="button" class="btn btn-outline-secondary btn-lg">Web Hosting</button></a>
            </div>

        </div>
    </div>
    {{-- akhir jumbotron --}}
    {{-- two column  --}}
    <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-lg-4 offset-lg-2 col-md-5 offset-md-1 text-center kepsek">
                <img src="/assets/kepsek.png" alt="">
                <p>Ida Rohidayati, S.Pd, M.Pd.</p>
                <p>Kepala Sekolah</p>
            </div>
            <div class="col-lg-4 col-md-5">
                <h2>If you build it...</h2>
                <p>The columns will automatically stack on the top each other when the screen is less than 576px wide.</p>
                <p>Resize the browser window to see the effect. Responsive web design has become more important as the amount of mobile traffic now accounts for more than half of total internet traffic</p>
                <p>It can also display the web page differently depending on the screen size or viewing device.</p>
                <a href="#" class="btn btn-primary">Learn More</a>
            </div>
        </div>
    </div>
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
    <div class="container-fluid padding">
        <div class="row text-center padding shadow-sm m-5">
            <div class="col-lg-4 offset-lg-2 col-md-5 offset-md-1">
                <i class='bx bxs-book-reader'></i>
                <i class="fa-solid fa-book-open-reader"></i>
                <h3>VISI</h3>
                <p>Built with the latest version of HTML, HTML 5</p>
            </div>
            <div class="col-lg-4 col-md-5">
                <i class='bx bxs-book-reader'></i>
                <h3>MISI</h3>
                <p>Built with the latest version of Bootstrap, Bootstrap 5</p>
            </div>
            {{-- <div class="col-xs-12 col-md-4">
                <i class="fab fa-css3"></i>
                <h3>BOOTSTRAP</h3>
                <p>Built with the latest version of CSS, CSS 3</p>
            </div> --}}
        </div>
    </div>
    {{-- end tcs --}}
    <hr class="my-4">
    {{-- fix background --}}
    <figure>
        <div class="fixed-wrap">
            <div id="fixed">

            </div>
        </div>
    </figure>
    {{-- end  --}}
    {{-- emoji section  --}}
    <button class="fun" data-toggle="collapse" data-target="#emoji">Click For Fun</button>
    <div id="emoji" class="collapse">
        <div class="container-fluid padding">
            <div class="row text-center">
                <div class="col-sm-6 col-md-3">
                    <img class="gif" src="/assets/gif/panda.gif">
                </div>
                <div class="col-sm-6 col-md-3">
                    <img class="gif" src="/assets/gif/poo.gif">
                </div>
                <div class="col-sm-6 col-md-3">
                    <img class="gif" src="/assets/gif/unicorn.gif">
                </div>
                <div class="col-sm-6 col-md-3">
                    <img class="gif" src="/assets/gif/chicken.gif">
                </div>
            </div>
        </div>
    </div>
    {{-- end  --}}
    {{-- meet the team --}}
    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">Meet The Team</h1>
            </div>
            <hr>
        </div>
    </div>
    {{-- end  --}}
    {{-- card   --}}
    <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="/assets/foto-kepsek.jpg">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">John is an Internet enterpreneur with almost 20 years of experience.</p>
                        <a href="#" class="btn btn-outline-secondary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="/assets/foto-kepsek.jpg">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">John is an Internet enterpreneur with almost 20 years of experience.</p>
                        <a href="#" class="btn btn-outline-secondary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="/assets/foto-kepsek.jpg">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">John is an Internet enterpreneur with almost 20 years of experience.</p>
                        <a href="#" class="btn btn-outline-secondary">See Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end  --}}
    {{-- two column  --}}
    <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-md-6">
                <h2>If you build it...</h2>
                <p>The columns will automatically stack on the top each other when the screen is less than 576px wide.</p>
                <p>Resize the browser window to see the effect. Responsive web design has become more important as the amount of mobile traffic now accounts for more than half of total internet traffic</p>
                <p>It can also display the web page differently depending on the screen size or viewing device.</p>
                <a href="#" class="btn btn-primary">Learn More</a>
            </div>
            <div class="col-lg-6">
                {{-- <img src="/assets/foto-kepsek.jpg" alt=""> --}}
            </div>
        </div>
        <hr class="my-4">
    </div>
    {{-- end tc  --}}
    {{-- social media --}}
    <div class="container-fluid padding">
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
    </div>
    {{-- end social media --}}
    {{-- footer  --}}
    <footer>
        <div class="container-fluid padding">
            <div class="row text-center">
                <div class="col-md-4">
                    <img src="/assets/logo.png">
                    <hr class="light">
                    <p>555-555-555</p>
                    <p>erdika@gmail.com</p>
                    <p>100 Street Name</p>
                    <p>City, State, 00000</p>
                </div>
                <div class="col-md-4">
                    <hr class="light">
                    <h5>Our Hours</h5>
                    <hr class="light">
                    <p>Monday: 9pm - 5pm</p>
                    <p>Saturday: 10am - 4pm</p>
                    <p>Sunday: closed</p>
                </div>
                <div class="col-md-4">
                    <hr class="light">
                    <h5>Our Hours</h5>
                    <hr class="light">
                    <p>City, State, 00000</p>
                    <p>City, State, 00000</p>
                    <p>City, State, 00000</p>
                </div>
                <div class="col-12">
                    <hr class="light">
                    <h5>&copy; smpn1cilamayawetan.com</h5>
                </div>
            </div>
        </div>
    </footer>
    {{-- end footer  --}}
    <!-- Akhir Hero -->
    <!-- Awal Sambutan -->
    {{-- <div class="sambutan container">
        <div class="row my-5">
            <div class="col">
                <img src="/assets/kepsek.png" class="d-block width-100" alt="Product Image">
                
            </div>
            <div class="col">
            @foreach($sambutan as $smbtn)
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
            @foreach($posts as $post)
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

