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
                <li class="nav-header">E-RAPORT</li>
                <li class="nav-item">
                    <a href="/teacher/ck" class="nav-link {{ Request::is('teacher/ck') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Data Kompetensi
                        </p>
                    </a>
                </li>
                <li class="nav-item @yield('main')">
                    <a href="#" class="nav-link @yield('rencanaPenilaian')">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Rencana Penilaian
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
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
                        <i class="nav-icon bx bxs-news"></i>
                        <p>
                            Input Nilai
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
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
                    <form action="/logout{{ route('logout') }}" method="post">
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
