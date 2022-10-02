{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-warning" style="background-color: #528288 !important">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="/assets/logo.png" alt="" width="60">
      SMPN 1</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav navbar-menu">
              <li class="nav-item mx-2">
                <a class="nav-link {{ ($active === "home") ? 'active' : ''}}" aria-current="page" href="/">Beranda</a>
              </li>
              <li class="nav-item dropdown mx-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profil
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Sejarah Singkat</a></li>
                  <li><a class="dropdown-item" href="#">Visi dan Misi</a></li>
                  <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                  <li><a class="dropdown-item" href="#">Guru dan Staff</a></li>
                  <li><a class="dropdown-item" href="#">Prestasi</a></li>
                  <li><a class="dropdown-item" href="#">Sarana dan Prasarana</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown mx-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Akademik
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Kalender Akademik</a></li>
                  <li><a class="dropdown-item" href="#">Mata Pelajaran</a></li>
                  <li><a class="dropdown-item" href="#">Materi Pelajaran</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown mx-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Kesiswaan
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Osis</a></li>
                  <li><a class="dropdown-item" href="#">Ekstrakulikuler</a></li>
                  <li><a class="dropdown-item" href="#">Kelas</a></li>
                </ul>
              </li>

              <li class="nav-item mx-2">
                <a class="nav-link {{ ($active === "Galeri") ? 'active' : ''}}" aria-current="page" href="#">Galeri</a>
              </li>

              <li class="nav-item mx-2">
                <a class="nav-link {{ ($active === "Galeri") ? 'active' : ''}}" aria-current="page" href="#">Kontak</a>
              </li>

              <li class="nav-item mx-2">
                <a class="nav-link {{ ($active === "posts") ? 'active' : ''}}" aria-current="page" href="/posts">Posts</a>
              </li>

              <li class="nav-item mx-2">
                <a class="nav-link {{ ($active === "categories") ? 'active' : ''}}" aria-current="page" href="/categories">categories</a>
              </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Welcome back, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                        <form action="/logout" method="post">
                          @csrf
                          <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                        </form>
                      </li>
                    </ul>
                  </li>

                @else
                <li class="nav-item">
                  <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : ''}}"><i class="bi bi-box-arrow-right"></i> Login</a>
                </li>
                @endauth
              </ul>


        </div>

    </div>
  </div>
</nav> --}}
{{-- <nav>
  <div class="logo">
    SMPN 1
  </div>
  <label for="btn" class="icon">
    <span class="fa fa-bars"></span>
  </label>
  <input type="checkbox" id="btn">
  <ul>
    <li>
      <a href="#">Home</a>
    </li>
    <li>
      <label for="btn-1" class="show">Profile +</label>
      <input type="checkbox" id="btn-1">
      <a href="#">Profil</a>
        <ul>
          <li><a href="#">Visi & Misi</a></li>
          <li><a href="#">Sejarah Singkat</a></li>
          <li><a href="#">Struktur Organisasi</a></li>
          <li><a href="#">Guru dan Staff</a></li>
          <li><a href="#">Fasilitas</a></li>
        </ul>
    </li>
    <li>
      <label for="btn-2" class="show">Akademik +</label>
      <input type="checkbox" id="btn-2">
      <a href="#">Akademik</a>
        <ul>
          <li><a href="#">Visi & Misi</a></li>
          <li><a href="#">Sejarah Singkat</a></li>
          <li><a href="#">Struktur Organisasi</a></li>
          <li><a href="#">Guru dan Staff</a></li>
          <li><a href="#">Fasilitas</a></li>
        </ul>
    </li>
    <li>
      <a href="#">Kesiswaan</a>
    </li>
    <li>
      <a href="#">Galeri</a>
    </li>
    <li>
      <a href="#">Kontak</a>
    </li>
  </ul>
  <div class="burger">
    <div class="line1"></div>
    <div class="line2"></div>
    <div class="line3"></div>
  </div>
</nav> --}}

<nav>
    <div class="kotak">

    </div>
    <div class="logo">
        <img src="/assets/logoSMP.png" alt="" width="165">
    </div>
    <label for="btn" class="icon">
        <span class="fa fa-bars"></span>
    </label>
    <input type="checkbox" id="btn">
    <ul>
        <li><a href="#">Home</a></li>
        <li>
            <label for="btn-1" class="show">Profile +</label>
            <a href="#">Profile
                <i class='bx bx-chevron-down'></i>
            </a>
            <input type="checkbox" id="btn-1">
            <ul>
                <li><a href="#">Visi & Misi</a></li>
                <li><a href="#">Sejarah Singkat</a></li>
                <li><a href="#">Struktur Organisasi</a></li>
                <li><a href="#">Guru dan Staff</a></li>
                <li><a href="#">Fasilitas</a></li>
            </ul>
        </li>
        <li>
            <label for="btn-2" class="show">Akademik +</label>
            <a href="#">Akademik
                <i class='bx bx-chevron-down'></i>
            </a>
            <input type="checkbox" id="btn-2">
            <ul>
                <li><a href="#">Kalender Akademik</a></li>
                <li><a href="#">Mata Pelajaran</a></li>
                {{-- <li>
          <label for="btn-3" class="show">More +</label>
          <a href="#">More <span class="fa fa-plus"></span></a>
          <input type="checkbox" id="btn-3">
          <ul>
            <li><a href="#">Submenu-1</a></li>
            <li><a href="#">Submenu-2</a></li>
            <li><a href="#">Submenu-3</a></li>
          </ul>
        </li> --}}
            </ul>
        </li>
        <li>
            <label for="btn-3" class="show">Kesiswaan +</label>
            <a href="#">Kesiswaan
                <i class='bx bx-chevron-down'></i>
            </a>
            <input type="checkbox" id="btn-3">
            <ul>
                <li><a href="#">OSIS</a></li>
                <li><a href="#">Ekstrakulikuler</a></li>
                <li><a href="#">Kelas</a></li>
                <li><a href="#">Prestasi Siswa</a></li>
            </ul>
        </li>
        <li><a href="/posts">Berita</a></li>
        <li><a href="#">Kontak</a></li>
    </ul>
</nav>
