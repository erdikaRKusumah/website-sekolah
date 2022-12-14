<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMPN 1 Cilamaya Wetan | Dashboard</title>

    <link rel="icon" href="/assets/favicon-16x16.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- pace-progress -->
    <link rel="stylesheet" href="/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed pace-primary">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown pr-2">
                    <!-- User Block  -->
                    <a class="user-block" data-toggle="dropdown" href="#">
                        @if (Auth::user()->role == 1)
                            <img class="img-circle" src="/dist/img/{{ Auth::user()->admin->image }}" alt="User Image">
                            <span class="username">{{ Auth::user()->admin->full_name }}</span>
                            <span class="description">Administrator</span>
                        @elseif(Auth::user()->role == 2)
                            <img class="img-circle" src="/dist/img/{{ Auth::user()->teacher->image }}" alt="User Image">
                            <span class="username">{{ Auth::user()->teacher->full_name }}</span>
                            <span class="description">{{ session()->get('akses_sebagai') }}</span>
                        @else
                            <img class="img-circle" src="/dist/img/{{ Auth::user()->student->image }}" alt="User Image">
                            <span class="username">{{ Auth::user()->student->full_name }}</span>
                            <span class="description">Siswa</span>
                        @endif
                    </a>
                    <!-- End User Block  -->

                    <!-- User Dropdown  -->
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Akun Saya</span>
                        {{-- <div class="dropdown-divider"></div>
                        <a href="{{ route('profile') }}" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a> --}}
                        <div class="dropdown-divider"></div>
                        <a href="/" class="dropdown-item">
                            <i class="fas fa-home mr-2"></i> Beranda
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('gantipassword') }}" class="dropdown-item">
                            <i class="fas fa-key mr-2"></i> Ganti Password
                        </a>
                        @if (Auth::user()->role == 2)
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('akses') }}" class="dropdown-item"
                                onclick="return confirm('Apakah anda yakin akan ganti akses login ?')">
                                @if (session()->get('akses_sebagai') == 'Guru Mapel')
                                    <i class="fas fa-chalkboard-teacher mr-2"></i> Akses Sebagai Wali Kelas
                                @else
                                    <i class="fas fa-chalkboard-teacher mr-2"></i> Akses Sebagai Guru Mapel
                                @endif
                            </a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer bg-danger"
                            onclick="return confirm('Apakah anda yakin ingin keluar ?')"><i
                                class="fas fa-sign-out-alt mr-1"></i> Keluar / Logout</a>
                    </div>
                    <!-- End User Dropdown  -->
                </li>
            </ul>
        </nav>
