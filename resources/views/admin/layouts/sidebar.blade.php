    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/users" class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}">
                        <i class="nav-icon nav-icon fas fa-user-friends"></i>
                        <p>
                            Data User
                        </p>
                    </a>
                </li>
                <li class="nav-header">INFORMASI</li>
                <li class="nav-item">
                    <a href="/admin/profiles" class="nav-link {{ Request::is('admin/profiles') ? 'active' : '' }}">
                        <i class="nav-icon bx bxs-school"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
                <li class="nav-item @yield('main')">
                    <a href="#" class="nav-link @yield('berita')">
                        <i class="nav-icon bx bxs-news"></i>
                        <p>
                            Informasi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/posts" class="nav-link @yield('posts')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Informasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/categories" class="nav-link @yield('categories')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Informasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/admin/galleries" class="nav-link {{ Request::is('admin/galleries') ? 'active' : '' }}">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Galeri
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/extracurriculars"
                        class="nav-link {{ Request::is('admin/extracurriculars') ? 'active' : '' }}">
                        <i class='nav-icon bx bxs-basketball'></i>
                        <p>
                            Ekstrakulikuler
                        </p>
                    </a>
                </li>
                <li class="nav-header">AKADEMIK</li>
                <li class="nav-item @yield('akademik')">
                    <a href="#" class="nav-link @yield('dataMaster')">
                        <i class="nav-icon fas fa-server"></i>
                        <p>
                            Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/teachers" class="nav-link @yield('teachers')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Guru</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/tapel" class="nav-link @yield('tapel')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Tahun Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/subjects" class="nav-link @yield('subjects')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Mata Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/kelas" class="nav-link @yield('kelas')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kelas & Wali</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/students" class="nav-link @yield('students')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/pembelajaran" class="nav-link @yield('pembelajaran')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pembelajaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/admin/mapping" class="nav-link {{ Request::is('admin/mapping') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list-ol"></i>
                        <p>
                            Mapping Mapel
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/kd" class="nav-link {{ Request::is('admin/kd') ? 'active' : '' }}">
                        <i class='nav-icon fas fa-clipboard-list'></i>
                        <p>
                            Data Kompetensi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/kkm" class="nav-link {{ Request::is('admin/kkm') ? 'active' : '' }}">
                        <i class='nav-icon fas fa-greater-than-equal'></i>
                        <p>
                            KKM Mapel
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/interval" class="nav-link {{ Request::is('admin/interval') ? 'active' : '' }}">
                        <i class='nav-icon fas fa-columns'></i>
                        <p>
                            Interval Predikat
                        </p>
                    </a>
                </li>
                <li class="nav-item bg-danger mt-2">
                    <form action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link"
                            onclick="return confirm('Apakah anda yakin ingin keluar ?')">
                            <i style="color:white;" class="nav-icon fas fa-sign-out-alt"></i>
                            <p style="color: white;">
                                Keluar / Logout
                            </p>
                        </button>
                    </form>
                </li>
        </nav>
    </div>
