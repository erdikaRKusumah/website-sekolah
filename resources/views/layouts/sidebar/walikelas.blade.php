<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="/assets/logo.png" alt="Logo" class="brand-image img-circle">
        <span class="brand-text font-weight-light">Aplikasi E-Raport</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
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
                    <a href="{{ route('pesertadidik') }}"
                        class="nav-link {{ Request::is('teacher/pesertadidik') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Peserta Didik
                        </p>
                    </a>
                </li>

                {{-- @if (Session::get('kurikulum') == '2013') --}}
                <!-- Kurikulum 2013 -->

                <li class="nav-item">
                    <a href="{{ route('statusnilaiguru') }}"
                        class="nav-link {{ Request::is('teacher/statusnilaiguru') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-check-circle"></i>
                        <p>
                            Cek Status Penilaian
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('hasilnilaiformatif') }}"
                        class="nav-link {{ Request::is('teacher/hasilnilaiformatif') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-check-square"></i>
                        <p>
                            Hasil Nilai Formatif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('hasilnilai') }}"
                        class="nav-link {{ Request::is('teacher/hasilnilai') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-check-square"></i>
                        <p>
                            Hasil Pengelolaan Nilai
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
