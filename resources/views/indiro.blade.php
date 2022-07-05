<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    @yield('meta')
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{ 'indiro/images/favicon.png' }}">

    <!-- Stylesheet -->
    <link href="{{ asset('indiro/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('indiro/vendor/lightgallery/css/lightgallery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('indiro/vendor/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet">
    <link href="{{ asset('indiro/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('indiro/vendor/animate/animate.css') }}" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('indiro/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('indiro/vendor/rangeslider/rangeslider.css') }}">
    <link rel="stylesheet" class="skin" href="{{ asset('indiro/css/skin/skin-1.css') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

</head>

<body id="bg">
    <div id="loading-area" class="loading-page-3">
        <div class="loading-inner">
            <div class="loader">
                <div class="circle"></div>
            </div>
            <div class="loader">
                <div class="circle"></div>
            </div>
        </div>
    </div>
    <div class="page-wraper">
        <!-- Header -->
        <x-iheader></x-iheader>


        @yield('body')

        <x-ifooter></x-ifooter>
        <!-- Footer End -->
        <button class="scroltop icon-up" type="button"><i class="fas fa-arrow-up"></i></button>

    </div>
    <!-- JAVASCRIPT FILES ========================================= -->
    {{-- <script data-cfasync="false" src="{{ asset('js/email-decode.min.js') }}"></script> --}}
    <script src="{{ asset('indiro/js/jquery.min.js') }}"></script>
    <!-- JQUERY.MIN JS -->
    <script src="{{ asset('indiro/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- BOOTSTRAP.MIN JS -->
    <script src="{{ asset('indiro/vendor/rangeslider/rangeslider.js') }}"></script>
    <!-- RANGESLIDER -->
    <script src="{{ asset('indiro/vendor/magnific-popup/magnific-popup.js') }}"></script>
    <!-- MAGNIFIC POPUP JS -->
    <script src="{{ asset('indiro/vendor/lightgallery/js/lightgallery-all.min.js') }}"></script>
    <!-- LIGHTGALLERY -->
    <script src="{{ asset('indiro/vendor/counter/waypoints-min.js') }}"></script>
    <!-- WAYPOINTS JS -->
    <script src="{{ asset('indiro/vendor/counter/counterup.min.js') }}"></script>
    <!-- COUNTERUP JS -->
    <script src="{{ asset('indiro/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <!-- OWL-CAROUSEL -->
    <script src="{{ asset('indiro/vendor/aos/aos.js') }}"></script>
    <!-- AOS -->
    <script src="{{ asset('indiro/vendor/particles/particles.js') }}"></script>
    <!-- PARTICLES JS  -->
    <script src="{{ asset('indiro/vendor/particles/particles.app.js') }}"></script>

    <!-- Google API For Recaptcha  -->
    <script src="{{ asset('indiro/js/dz.carousel.js') }}"></script>
    <!-- OWL CAROUSEL -->
    <script src="{{ asset('indiro/js/dz.ajax.js') }}"></script>
    <!-- AJAX -->
    <script src="{{ asset('indiro/js/custom.js') }}"></script>
    <!-- CUSTOM JS -->
    @stack('js')
</body>

</html>
