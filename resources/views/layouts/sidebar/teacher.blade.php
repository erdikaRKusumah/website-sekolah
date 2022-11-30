<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/index3.html" class="brand-link">
        <img src="/assets/logo.png" alt="Logo" class="brand-image img-circle" style="opacity: .8">
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
                <li class="nav-header">E-RAPORT</li>
                <li class="nav-item">
                    <a href="/teacher/ck" class="nav-link {{ Request::is('teacher/ck') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Data Kompetensi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('teacher/rencanaformatif') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Rencana Penilaian
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/teacher/rencanaformatif"
                                class="nav-link {{ Request::is('teacher/rencanaformatif') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penilaian Formatif</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/teacher/rencanasumatif" class="nav-link @yield('rencanasumatif')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penilaian Sumatif</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/teacher/bobotnilai" class="nav-link @yield('bobotnilai')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bobot Penilaian</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @yield('main')">
                    <a href="#" class="nav-link @yield('berita')">
                        <i class="nav-icon fas fa-list-ol"></i>
                        <p>
                            Input Nilai
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/teacher/nilaiformatif" class="nav-link @yield('nilaiformatif')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Formatif</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/teacher/nilaisumatif" class="nav-link @yield('nilaisumatif')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sumatif</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/teacher/nilaisumatifakhir" class="nav-link @yield('nilaisumatifakhir')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sumatif Akhir</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/teacher/kirimnilaiakhir"
                        class="nav-link {{ Request::is('teacher/kirimnilaiakhir') ? 'active' : '' }}">
                        <i class="fas fa-paper-plane nav-icon"></i>
                        <p>
                            Kirim Nilai Akhir
                        </p>
                    </a>
                </li>
                <li class="nav-item bg-danger mt-2">
                    <a href="/logout" class="nav-link" onclick="return confirm('Apakah anda yakin ingin keluar ?')">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Keluar / Logout
                        </p>
                    </a>
                </li>
        </nav>
    </div>
</aside>
