<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="/assets/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SACITAN</span>
    </a>
    <div class="sidebar">
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
                    <a href="/admin/profiles"
                        class="nav-link {{ Request::is('admin/profiles', 'admin/profiles/*') ? 'active' : '' }}">
                        <i class="nav-icon bx bxs-school"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item {{ Request::is('admin/posts', 'admin/categories', 'admin/categories/*', 'admin/posts/*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('admin/posts', 'admin/categories', 'admin/categories/*', 'admin/posts/*') ? 'active' : '' }}">
                        <i class="nav-icon bx bxs-news"></i>
                        <p>
                            Informasi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/posts"
                                class="nav-link {{ Request::is('admin/posts', 'admin/posts/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Informasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/categories"
                                class="nav-link {{ Request::is('admin/categories') || Request::is('admin/categories/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Informasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/admin/galleries"
                        class="nav-link {{ Request::is('admin/galleries', 'admin/galleries/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Galeri
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/extracurriculars"
                        class="nav-link {{ Request::is('admin/extracurriculars', 'admin/extracurriculars/*') ? 'active' : '' }}">
                        <i class='nav-icon bx bxs-basketball'></i>
                        <p>
                            Ekstrakulikuler
                        </p>
                    </a>
                </li>
                <li class="nav-header">AKADEMIK</li>
                <li
                    class="nav-item {{ Request::is('admin/teachers', 'admin/tapel', 'admin/kelas', 'admin/kelas/*', 'admin/students', 'admin/subjects', 'admin/pembelajaran', 'admin/pembelajaran/*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('admin/teachers', 'admin/tapel', 'admin/kelas', 'admin/kelas/*', 'admin/students', 'admin/subjects', 'admin/pembelajaran', 'admin/pembelajaran/*') ? 'active' : '' }}">
                        <i class="nav-icon bx bxs-news"></i>
                        <p>
                            Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/teachers"
                                class="nav-link {{ Request::is('admin/teachers') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Guru</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/tapel" class="nav-link {{ Request::is('admin/tapel') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Tahun Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/subjects"
                                class="nav-link {{ Request::is('admin/subjects') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Mata Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/kelas"
                                class="nav-link {{ Request::is('admin/kelas', 'admin/kelas/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kelas & Wali</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/students"
                                class="nav-link {{ Request::is('admin/students') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/pembelajaran"
                                class="nav-link {{ Request::is('admin/pembelajaran', 'admin/pembelajaran/*') ? 'active' : '' }}">
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
                    <a href="/admin/kd" class="nav-link {{ Request::is('admin/kd', 'admin/kd/*') ? 'active' : '' }}">
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
                <li class="nav-header">HASIL RAPORT</li>
                <li class="nav-item">
                    <a href="{{ route('statuspenilaian.index') }}"
                        class="nav-link {{ Request::is('admin/statuspenilaian', 'admin/statuspenilaian/*') ? 'active' : '' }}">
                        <i class='nav-icon fas fa-check-circle'></i>
                        <p>
                            Status Penilaian
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengelolaannilai.index') }}"
                        class="nav-link {{ Request::is('admin/pengelolaannilai', 'admin/pengelolaannilai/*') ? 'active' : '' }}">
                        <i class='nav-icon fas fa-check-square'></i>
                        <p>
                            Hasil Pengelolaan Nilai
                        </p>
                    </a>
                </li>
        </nav>
    </div>
</aside>
@yield('container')
