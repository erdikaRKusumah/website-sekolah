<nav class="navbar navbar-expand-lg navbar-dark bg-warning" style="background-color: #528288 !important">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="/assets/logo.png" alt="" width="60">
        SMPN 1</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="container">
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav navbar-menu">
                <li class="nav-item mx-2">
                  <a class="nav-link {{ ($active === "Home") ? 'active' : ''}}" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item dropdown mx-2">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Profil
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Sejarah Singkat</a></li>
                    <li><a class="dropdown-item" href="#">Visi dan Misi</a></li>
                    <li><a class="dropdown-item" href="#">Fasilitas</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown mx-2">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Akademik
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Program Kelas</a></li>
                    <li><a class="dropdown-item" href="#">Ekstrakulikuler</a></li>
                  </ul>
                </li>
      
                <li class="nav-item mx-2">
                  <a class="nav-link {{ ($active === "Galeri") ? 'active' : ''}}" aria-current="page" href="#">Galeri</a>
                </li>
      
                <li class="nav-item dropdown mx-2">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Media & Informasi
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>

                <li class="nav-item mx-2">
                  <a class="nav-link {{ ($active === "posts") ? 'active' : ''}}" aria-current="page" href="/posts">Posts</a>
                </li>

                <li class="nav-item mx-2">
                  <a class="nav-link {{ ($active === "categories") ? 'active' : ''}}" aria-current="page" href="/categories">categories</a>
                </li>
              </ul>
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a href="/login" class="nav-link" {{ ($active === "login") ? 'active' : ''}}><i class="bi bi-box-arrow-right"></i> Login</a>
                </li>
              </ul>
            
          </div>
          
      </div>
    </div>
  </nav>