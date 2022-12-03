<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="/css/login.css"> --}}
    {{-- <link rel="stylesheet" href="/css/home.css"> --}}

    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('css') }}/navbar.css">
    <link rel="stylesheet" href="{{ asset('css') }}/style.css">

    {{-- <link href="/css/style.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://m.w3newbie.com/you-tube.css"> --}}

    {{-- logo title --}}
    <link rel="icon" href="/assets/favicon-16x16.png" type="image/x-icon">

    <title>SMPN 1 Cilamaya Wetan | {{ $title }}</title>
</head>

<body>
    @include('partials.navbar')
    <section>
        <div class="bg-profile">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center title">
                        <h1>SMPN 1 Cilamaya Wetan</h1>
                        <p>{{ $title }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="ml-4"><a href="/" style="text-decoration: none; color:black;">Home</a> /
                            {{ $title }}</p>
                        <hr class="light">
                    </div>
                </div>
                @yield('container')
                <footer class="footer">
                    <div class="container-fluid padding">
                        <div class="row">
                            <div class="col-lg-4 offset-lg-1">
                                <img src="/assets/logo.png" style="width: 150px; float:left;">
                                <h3 style="font-weight: bold;">SMPN 1 Cilamaya Wetan</h3>
                                <p style="font-weight: bold;">Akreditas A</p>
                                <p>Karawang</p>
                                <hr class="light">
                                <p>SMPN 1 Cilamaya Wetan adalah Sekolah Menengah Pertama (SMP) Negeri yang berlokasi di
                                    Propinsi
                                    Jawa
                                    Barat Kabupaten Kab. Kerawang dengan alamat Jl. Raya Cilamaya Cilamaya
                                    Wetan-karawang.</p>
                                <h3 style="font-weight: bold;">KONTAK KAMI</h3>
                                <i class='bx bx-phone'></i>
                                <p>02632330006</p>
                                <i class='bx bx-envelope'></i>
                                <p>smpn1cilamayawetan@gmail.com</p>
                            </div>
                            <div class="col-lg-3">
                            </div>
                            <div class="col-lg-4 col-md-12 text-center">
                                {{-- <div class="kotakk">

                    </div> --}}
                                <p><iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.083584668928!2d107.5778920147692!3d-6.252717395474091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e696674a821a355%3A0x77df6e9c146e3150!2sSMP%20Negeri%201%20Cilamaya%20Wetan!5e0!3m2!1sid!2sid!4v1664648745770!5m2!1sid!2sid"
                                        width="500" height="300" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
                            </div>
                        </div>
                    </div>
                </footer>
                <script src="/plugins/jquery/jquery.min.js"></script>
                <script src="/plugins/popper/popper.js"></script>
                <script src="/plugins/bootstrap/bootstrap.min.js"></script>
                <script src="/plugins/custom/main.js"></script>

                {{-- <script src="/js/app.js"></script> --}}
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
                </script>
</body>

</html>
