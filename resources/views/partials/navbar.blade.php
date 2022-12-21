{{-- <nav>
    <div class="kotak">

    </div>
    <div class="logo">
        <a href="/">
            <img src="/assets/logoSMP.png" alt="" width="165">

        </a>
    </div>
    <label for="btn" class="icon">
        <span class="fa fa-bars"></span>
    </label>
    <input type="checkbox" id="btn">
    <ul>
        <li><a href="/">Home</a></li>
        <li>
            <label for="btn-1" class="show">Profile +</label>
            <a href="#">Profile
                <i class='bx bx-chevron-down'></i>
            </a>
            <input type="checkbox" id="btn-1">
            <ul>
                <li><a href="/greeting">Kepala Sekolah</a></li>
                <li><a href="/visionMision">Visi & Misi</a></li>
                <li><a href="/history">Sejarah Singkat</a></li>
                <li><a href="/structure">Struktur Organisasi</a></li>
            </ul>
        </li>
        <li>
            <label for="btn-2" class="show">Akademik +</label>
            <a href="#">Akademik
                <i class='bx bx-chevron-down'></i>
            </a>
            <input type="checkbox" id="btn-2">
            <ul>
                <li><a href="/login">Nilai Raport</a></li>
                <li><a href="#">Mata Pelajaran</a></li>
            </ul>
        </li>
        <li>
            <label for="btn-3" class="show">Kesiswaan +</label>
            <a href="#">Kesiswaan
                <i class='bx bx-chevron-down'></i>
            </a>
            <input type="checkbox" id="btn-3">
            <ul>
                <li><a href="/extracurriculars">Ekstrakulikuler</a></li>
                <li><a href="/classes">Kelas</a></li>
                <li><a href="/achievements">Prestasi Siswa</a></li>
            </ul>
        </li>
        <li><a href="/posts">Berita</a></li>
    </ul>
</nav> --}}
<div class="affix">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/assets/logoSMP.png" alt="Logo" width="165" class="d-inline-block align-text-top">
            </a>
            {{-- <form action="#" class="searchform order-sm-start order-lg-last">
                <div class="form-group d-flex">
                    <input type="text" class="form-control pl-3" placeholder="Search">
                    <button type="submit" placeholder="" class="form-control search"><span
                            class="fa fa-search"></span></button>
                </div>
            </form> --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a href="/"
                            class="nav-link">Home</a>
                    </li>
                    <li
                        class="nav-item {{ Request::is('greeting', 'visionMision', 'history', 'structure') ? 'active' : '' }} dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Profile</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="/greeting">Kepala Sekolah</a>
                            <a class="dropdown-item" href="/visionMision">Visi & Misi</a>
                            <a class="dropdown-item" href="/history">Sejarah Singkat</a>
                            <a class="dropdown-item" href="/structure">Struktur Organisasi</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Akademik</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="/login">Nilai Raport</a>
                            <a class="dropdown-item" href="/subjects">Mata Pelajaran</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Kesiswaan</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="/classes">Kelas</a>
                            <a class="dropdown-item" href="/extracurriculars">Ekstrakulikuler</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="/posts" class="nav-link">Informasi</a></li>
                </ul>
                @auth
                    <ul class="navbar-nav ml-5 ms-auto">
                        <!-- Notifications Dropdown Menu -->
                        <li class="nav-item dropdown pr-2">
                            <!-- User Block  -->
                            <a class="user-block" data-toggle="dropdown04" href="#">
                                @if (Auth::user()->role == 1)
                                    <img class="img-circle" src="/dist/img/{{ Auth::user()->admin->image }}"
                                        alt="User Image">
                                    <span class="username text-black">{{ Auth::user()->admin->full_name }}</span>
                                    <span class="description">Administrator</span>
                                @elseif(Auth::user()->role == 2)
                                    <img class="img-circle" src="/dist/img/{{ Auth::user()->teacher->image }}"
                                        alt="User Image">
                                    <span class="username text-black">{{ Auth::user()->teacher->full_name }}</span>
                                    <span class="description">{{ session()->get('akses_sebagai') }}</span>
                                @else
                                    <img class="img-circle" src="/dist/img/{{ Auth::user()->student->image }}"
                                        alt="User Image">
                                    <span class="username text-black">{{ Auth::user()->student->full_name }}</span>
                                    <span class="description">Siswa</span>
                                @endif
                            </a>
                            <!-- End User Block  -->

                            <!-- User Dropdown  -->
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-item dropdown-header">Akun Saya</span>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('dashboard') }}" class="dropdown-item">
                                    <i class="fas fa-home mr-2"></i> Dashboard
                                </a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer bg-danger"
                                    onclick="return confirm('Apakah anda yakin ingin keluar ?')"><i
                                        class="fas fa-sign-out-alt mr-1"></i> Keluar / Logout</a>
                            </div>
                            <!-- End User Dropdown  -->
                        </li>
                    </ul>

                @endauth
            </div>
        </div>

    </nav>

</div>


{{-- <img src="/assets/logoSMP.png" alt="Logo" width="165" class="d-inline-block align-text-top">

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Link
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
    </ul>
</li> --}}
