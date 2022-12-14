<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/assets/theme/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/theme/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/theme/css/tooplate-style.css">
    <!-- bootstrap icon -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="{{ asset('css') }}/navbar.css">
    <link rel="stylesheet" href="{{ asset('css') }}/style.css">

    {{-- logo title --}}
    <link rel="icon" href="/assets/favicon-16x16.png" type="image/x-icon">

    <title>SMPN 1 Cilamaya Wetan | {{ $title }}</title>
</head>

<body>
    @include('partials.navbar')
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
                    <p>SMPN 1 Cilamaya Wetan adalah Sekolah Menengah Pertama (SMP) Negeri yang berlokasi di Propinsi
                        Jawa
                        Barat Kabupaten Kab. Kerawang dengan alamat Jl. Raya Cilamaya Cilamaya Wetan-karawang.</p>
                    <h4 style="font-weight: bold;">KONTAK KAMI</h4>
                    <i class='bx bx-phone'></i>
                    <p>02632330006</p>
                    <i class='bx bx-envelope'></i>
                    <p>smpn1cilamayawetan@gmail.com</p>
                </div>
                <div class="col-lg-2">
                </div>
                <div class="col-lg-5 col-md-12 text-center">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 offset-lg-1">
                            <div id="google-map"></div>
                        </div>
                    </div>
                    {{-- <div class="kotakk">

                    </div> --}}
                    {{-- <p><iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.083584668928!2d107.5778920147692!3d-6.252717395474091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e696674a821a355%3A0x77df6e9c146e3150!2sSMP%20Negeri%201%20Cilamaya%20Wetan!5e0!3m2!1sid!2sid!4v1664648745770!5m2!1sid!2sid"
                            width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe></p> --}}
                </div>
            </div>
        </div>
    </footer>

    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/theme/js/jquery-1.11.3.min.js"></script>
    <script src="/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="/assets/theme/js/jquery.magnific-popup.js"></script>
    <script src="/assets/theme/js/bootstrap.min.js"></script> <!-- Plugins -->
    <script src="/assets/theme/js/slick.min.js"></script>
    <script src="/plugins/custom/main.js"></script>
    <script>
        window.onscroll = function(e) {
            let valueDisplay = document.querySelectorAll(".counter");
            let interval = 1000;

            valueDisplay.forEach((valueDisplay) => {
                let startValue = 0;
                let endValue = parseInt(valueDisplay.getAttribute("data-val"));
                let duration = Math.floor(interval / endValue);
                let counter = setInterval(function() {
                    startValue += 1;
                    valueDisplay.textContent = startValue;
                    if (startValue == endValue) {
                        clearInterval(counter);
                    }
                }, duration);
            });

        }
    </script>
    <script>
        function adjustHeightOfPage(pageNo) {

            var offset = 80;
            var pageContentHeight = 0;

            var pageType = $('div[data-page-no="' + pageNo + '"]').data("page-type");

            if (pageType != undefined && pageType == "gallery") {
                pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .tm-img-gallery-container").height();
            } else {
                pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .js-tm-page-content").height() + 20;
            }

            if ($(window).width() >= 992) {
                offset = 120;
            } else if ($(window).width() < 480) {
                offset = 40;
            }

            // Get the page height
            var totalPageHeight = $('.cd-slider-nav').height() +
                pageContentHeight + offset +
                $('.tm-footer').height();

            // Adjust layout based on page height and window height
            if (totalPageHeight > $(window).height()) {
                $('.cd-hero-slider').addClass('small-screen');
                $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", totalPageHeight + "px");
            } else {
                $('.cd-hero-slider').removeClass('small-screen');
                $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", "100%");
            }
        }

        /*
            Everything is loaded including images.
        */
        $(window).load(function() {

            adjustHeightOfPage(1); // Adjust page height

            /* Gallery One pop up
            -----------------------------------------*/
            $('.gallery-one').magnificPopup({
                delegate: 'a', // child items selector, by clicking on it popup will open
                type: 'image',
                gallery: {
                    enabled: true
                }
            });

            /* Gallery Two pop up
                    -----------------------------------------*/
            $('.gallery-two').magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                }
            });

            /* Gallery Three pop up
            -----------------------------------------*/
            $('.gallery-three').magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                }
            });

            /* Collapse menu after click
            -----------------------------------------*/
            $('#tmNavbar a').click(function() {
                $('#tmNavbar').collapse('hide');

                adjustHeightOfPage($(this).data("no")); // Adjust page height
            });

            /* Browser resized
            -----------------------------------------*/
            $(window).resize(function() {
                var currentPageNo = $(".cd-hero-slider li.selected .js-tm-page-content").data("page-no");

                // wait 3 seconds
                setTimeout(function() {
                    adjustHeightOfPage(currentPageNo);
                }, 1000);

            });

            // Remove preloader (https://ihatetomatoes.net/create-custom-preloading-screen/)
            $('body').addClass('loaded');

        });

        /* Google map
        ------------------------------------------------*/
        var map = '';
        var center;

        function initialize() {
            var mapOptions = {
                zoom: 17,
                center: new google.maps.LatLng(-6.252723, 107.580080),
                scrollwheel: false
            };

            map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

            google.maps.event.addDomListener(map, 'idle', function() {
                calculateCenter();
            });

            google.maps.event.addDomListener(window, 'resize', function() {
                map.setCenter(center);
            });
        }

        function calculateCenter() {
            center = map.getCenter();
        }

        function loadGoogleMap() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
            document.body.appendChild(script);
        }

        // DOM is ready
        $(function() {
            loadGoogleMap(); // Google Map
        });
    </script>


</body>

</html>
