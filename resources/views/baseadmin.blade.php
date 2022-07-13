<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themepixels.me/demo/chain/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jan 2022 09:54:27 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin APS</title>

    <link href="{{ asset('chain/css/style.default.css') }}" rel="stylesheet">
    @yield('staffcss')
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <header>
        <div class="headerwrapper">
            <div class="header-left">
                <a href="index.html" class="logo">
                </a>
                <div class="pull-right">
                    <a href="#" class="menu-collapse">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div><!-- header-left -->

            <x-header></x-header>

        </div><!-- headerwrapper -->
    </header>

    <section>
        <div class="mainwrapper">
            <x-sidebar></x-sidebar>

            <div class="mainpanel">
                @yield('pageheader')

                @yield('contentpage')

            </div>
        </div><!-- mainwrapper -->
    </section>


    <script src="{{ asset('chain/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('chain/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('chain/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('chain/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('chain/js/pace.min.js') }}"></script>
    <script src="{{ asset('chain/js/retina.min.js') }}"></script>
    <script src="{{ asset('chain/js/jquery.cookies.js') }}"></script>
    <script src="{{ asset('chain/js/custom.js') }}"></script>
    @stack('staffjs')
</body>

</html>
