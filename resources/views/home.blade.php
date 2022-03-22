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
    <div class="hero">
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

    </div>

    <!-- Akhir Hero -->
    <!-- Awal Sambutan -->
    <div class="sambutan container">
        <div class="row my-5">
            <div class="col">
                <h4>Selamat Datang</h4>
                <H2>SAMBUTAN KEPALA SEKOLAH</H2>
                <p>It is nigh impossible to capture the spirit of Trinity on the pages of a website. Glowing words
                    on a digital screen, photographs of smiling, engaged boys – they are what you’d expect from a
                    website of a school like ours.

                    You would expect to see academic rigour. To see a range of co-curricular activities. A thriving
                    Preparatory and Junior school, where boys from Pre-K to Year 6 are nurtured. Outstanding IB and
                    HSC results from our Year 12 young men after their time in our Middle and Senior school.

                    You can expect all that, and more. However, what you might find unexpected is my unwillingness
                    to measure the success of our School by the success of our young men.</p>
                <button type="button" class="btn btn-outline-secondary">Secondary</button>
            </div>
            <div class="col">
                <img src="/assets/foto-kepsek.jpg" class="d-block w-100" alt="...">
            </div>
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
    </div>
@endsection

