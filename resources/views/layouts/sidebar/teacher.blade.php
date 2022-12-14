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
                <li
                    class="nav-item {{ Request::is('teacher/rencanaformatif', 'teacher/rencanaformatif*', 'teacher/rencanasumatif', 'teacher/rencanasumatif/*', 'teacher/bobotnilai') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('teacher/rencanaformatif', 'teacher/rencanaformatif*', 'teacher/rencanasumatif', 'teacher/rencanasumatif/*', 'teacher/bobotnilai') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Rencana Penilaian
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/teacher/rencanaformatif"
                                class="nav-link {{ Request::is('teacher/rencanaformatif', 'teacher/rencanaformatif*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penilaian Formatif</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/teacher/rencanasumatif"
                                class="nav-link {{ Request::is('teacher/rencanasumatif', 'teacher/rencanasumatif/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penilaian Sumatif</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/teacher/bobotnilai"
                                class="nav-link {{ Request::is('teacher/bobotnilai') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bobot Penilaian</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ Request::is('teacher/nilaiformatif', 'teacher/nilaiformatif*', 'teacher/nilaisumatif', 'teacher/nilaisumatif/*', 'teacher/nilaisumatifakhir', 'teacher/nilaisumatifakhir/*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('teacher/nilaiformatif', 'teacher/nilaiformatif*', 'teacher/nilaisumatif', 'teacher/nilaisumatif/*', 'teacher/nilaisumatifakhir', 'teacher/nilaisumatifakhir/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list-ol"></i>
                        <p>
                            Input Nilai
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/teacher/nilaiformatif"
                                class="nav-link {{ Request::is('teacher/nilaiformatif', 'teacher/nilaiformatif/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Formatif</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/teacher/nilaisumatif"
                                class="nav-link {{ Request::is('teacher/nilaisumatif', 'teacher/nilaisumatif/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sumatif</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/teacher/nilaisumatifakhir"
                                class="nav-link {{ Request::is('teacher/nilaisumatifakhir', 'teacher/rencanasumatif/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sumatif Akhir</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/teacher/kirimnilaiakhir"
                        class="nav-link {{ Request::is('teacher/kirimnilaiakhir', 'teacher/kirimnilaiakhir/*') ? 'active' : '' }}">
                        <i class="fas fa-paper-plane nav-icon"></i>
                        <p>
                            Kirim Nilai Akhir
                        </p>
                    </a>
                </li>
        </nav>
    </div>
</aside>
