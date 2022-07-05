<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    @yield('meta')
    <meta name="author" content="LSP PPHI" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LSP PPHI</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,500,700%7CMontserrat:500,700&amp;display=swap"
        rel="stylesheet">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="{{ asset('finaxo/css/font-awesome/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('finaxo/css/bootstrap/bootstrap.min.css') }}" />

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature) -->
    <link rel="stylesheet" href="{{ asset('finaxo/css/animate/animate.min.css') }}" />

    <!-- Template Style -->
    <link rel="stylesheet" href="{{ asset('finaxo/css/style.css') }}" />
    @yield('css')

</head>

<body>

    <x-vheader></x-vheader>

    @yield('content')

    <x-vfooter></x-vfooter>

    <!--=================================
    Back To Top -->
    <div id="back-to-top" class="back-to-top">
        <a href="#"><i class="fas fa-angle-up"></i> </a>
    </div>
    <!--=================================
    Back To Top -->

    <!--=================================
    Javascript -->

    <!-- JS Global Compulsory (Do not remove)-->
    <script src="{{ asset('finaxo/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('finaxo/js/popper/popper.min.js') }}"></script>
    <script src="{{ asset('finaxo/js/bootstrap/bootstrap.min.js') }}"></script>
    @stack('js')
    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="{{ asset('finaxo/js/jquery.appear.js') }}"></script>
    <!-- Template Scripts (Do not remove)-->
    <script src="{{ asset('finaxo/js/custom.js') }}"></script>


</body>


</html>
