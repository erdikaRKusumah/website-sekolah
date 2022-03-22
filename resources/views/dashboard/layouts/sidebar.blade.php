{{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                <span data-feather="home"></span>
                Dashboard
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                <span data-feather="file-text"></span>
                My Posts
            </a>
            </li>

            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    Orders
                </button>
                <div class="collapse" id="orders-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="/dashboard/posts" class="link-dark rounded">New</a></li>
                        <li><a href="/dashboard" class="link-dark rounded">Processed</a></li>
                        <li><a href="#" class="link-dark rounded">Shipped</a></li>
                        <li><a href="#" class="link-dark rounded">Returned</a></li>
                    </ul>
                </div>
            </li>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 ml
            text-muted">
            <span>Administrator</span>
            </h6>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/test*') ? 'active' : '' }}" href="/dashboard/test">
                    <span data-feather="file-text"></span>
                    My Posts
                </a>
                </li>

        </ul>
    </div>
</nav> --}}

<div class="sidebar close">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <span class="logo_name">SACITAN</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="/dashboard">
                <i class='bx bx-grid-alt' ></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Category</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-user-circle' ></i>
                    <span class="link_name">Profil</span>
                </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Profil</a></li>
                <li><a href="/dashboard/posts">Visi dan Misi</a></li>
                <li><a href="#">Sejarah Singkat</a></li>
                <li><a href="#">Struktur Organisasi</a></li>
                <li><a href="#">Guru dan Staff</a></li>
                <li><a href="#">Prestasi</a></li>
                <li><a href="#">Sarana Prasarana</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-book' ></i>
                    <span class="link_name">Akademik</span>
                </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Akademik</a></li>
                <li><a href="/dashboard/posts">Kalender Akademik</a></li>
                <li><a href="#">Mata Pelajaran</a></li>
                <li><a href="#">Materi Pelajaran</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-body' ></i>
                    <span class="link_name">Kesiswaan</span>
                </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Kesiswaan</a></li>
                <li><a href="/dashboard/posts">Osis</a></li>
                <li><a href="#">Ekstrakulikuler</a></li>
                <li><a href="#">Kelas</a></li>
            </ul>
        </li>
        <li>
            <a href="/dashboard">
                <i class='bx bx-camera' ></i>
                <span class="link_name">Galeri</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Galeri</a></li>
            </ul>
        </li>
    </ul>
</div>




{{-- <div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
        <h3>Bootstrap slider</h3>
        </div>
        <ul class="lisst-unstyled components">
            <p>The Providers</p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                <ul class="collapse lisst-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            </li>
            <ul class="collapse lisst-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
            </ul>
            </li>
        </ul> --}}
