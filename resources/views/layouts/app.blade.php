<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{$pageName}} &mdash; Elasher</title>

    <!-- General CSS Files -->
    @vite('resources/sass/app.scss')
    <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">


    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">

    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            @include('inc.navbar')
            @include('inc.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>{{ $pageName }}</h1>
                        <div class="section-header-breadcrumb">
                            @foreach ($breadcrumbs as $crumb => $link)
                                <div class="breadcrumb-item"><a
                                        @if ($link) href="{{$link}}" @endif>{{ $crumb }}</a></div>
                            @endforeach
                        </div>
                    </div>

                    <div id="vueapp" class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; {{ \Carbon\Carbon::now()->year }} <div class="bullet"></div> Elasher, bought to you
                    by <a href="https://appsdept.com/" target="_blank">AppsDept</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="/assets/modules/jquery.min.js"></script>
    <script src="/assets/modules/popper.js"></script>
    <script src="/assets/modules/tooltip.js"></script>
    @vite('resources/js/app.js')
    <script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/assets/modules/moment.min.js"></script>
    <script src="/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/custom.js"></script>
</body>

</html>
