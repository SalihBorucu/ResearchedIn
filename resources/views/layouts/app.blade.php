{{-- @extends('layouts.navbar') --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>ResearchedIn</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">

</head>


<body>

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
    </div>



    <div class="wrapper">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        @include('layouts.nav-bar')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div> <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->





    <!-- jQuery  -->
    <script src="/js/vendor/jquery.min.js"></script>
    <script src="/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/js/vendor/modernizr.min.js"></script>
    <script src="/js/vendor/detect.js"></script>
    <script src="/js/vendor/fastclick.js"></script>
    <script src="/js/vendor/jquery.slimscroll.js"></script>
    <script src="/js/vendor/jquery.blockUI.js"></script>
    <script src="/js/vendor/waves.js"></script>
    <script src="/js/vendor/jquery.nicescroll.js"></script>
    <script src="/js/vendor/jquery.scrollTo.min.js"></script>
    <script src="/js/vendor/rwd-table.min.js"></script>

    <!-- App js -->
    <script src="/js/vendor/app.js"></script>

    @switch (true)
    @case (Request::is('home') || Request::is('home/*'))
    <script src="{{ mix('js/app.js') }}"></script>
    @endswitch
    {{-- <script src="{{ mix('js/home-app.js') }}"></script> --}}
</body>

</html>