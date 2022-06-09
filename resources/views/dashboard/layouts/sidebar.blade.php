    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-header">MANAGE DATA</li>
            <li class="nav-item">
              <a href="/dashboard/posts" class="nav-link {{ Request::is('dashboard/posts') ? 'active' : ''}}">
                <i class='nav-icon bx bxs-news'></i>
                <p>
                  Berita
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/dashboard/categories" class="nav-link {{ Request::is('dashboard/postsCategory') ? 'active' : ''}}">
                <i class="nav-icon bx bxs-category"></i>
                <p>
                  Kategori Berita
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/dashboard/galleries" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                  Galeri
                </p>
              </a>
            </li>
            <li class="nav-item @yield('main')">
              <a href="#" class="nav-link @yield('profil')">
                <i class="nav-icon bx bxs-school"></i>
                <p>
                  Data Sekolah
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/dashboard/sambutan" class="nav-link @yield('sambutan')">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Siswa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/visiMisi" class="nav-link @yield('visiMisi')">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Guru</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/staffs" class="nav-link @yield('sejarahSingkat')">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Staff</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../charts/uplot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Fasilitas</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book-open-reader"></i>
                <p>
                  Kesiswaan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../forms/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>OSIS</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../forms/advanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ekstrakulikuler</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../forms/editors.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kelas</p>
                  </a>
                </li>
              </ul>
            </li>
            {{-- <li class="nav-header">DATA STATIC</li>
            <li class="nav-item @yield('main')">
              <a href="#" class="nav-link @yield('profil')">
                <i class="nav-icon fas fa-circle-user"></i>
                <p>
                  Profil
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/dashboard/sambutan" class="nav-link @yield('sambutan')">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sambutan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/visiMisi" class="nav-link @yield('visiMisi')">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Visi dan Misi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/sejarahSingkat" class="nav-link @yield('sejarahSingkat')">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sejarah Singkat</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../charts/uplot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Struktur Organisasi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../charts/uplot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Guru dan Staff</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../charts/uplot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Prestasi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../charts/uplot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sarana dan Prasarana</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Akademik
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../UI/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kalender Akademik</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../UI/icons.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mata Pelajaran</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../UI/buttons.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Materi Pelajaran</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="pages/gallery.html" class="nav-link">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                  Kontak
                </p>
              </a>
            </li>
          </ul> --}}
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->





