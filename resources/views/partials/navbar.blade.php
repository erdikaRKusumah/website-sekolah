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
            <form action="#" class="searchform order-sm-start order-lg-last">
                <div class="form-group d-flex">
                    <input type="text" class="form-control pl-3" placeholder="Search">
                    <button type="submit" placeholder="" class="form-control search"><span
                            class="fa fa-search"></span></button>
                </div>
            </form>
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
                            <a class="dropdown-item" href="/achievements">Prestasi Siswa</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="/posts" class="nav-link">Informasi</a></li>
                </ul>
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
