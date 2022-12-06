<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        BK Politeknik Negeri Banyuwangi
    </title>
    <!-- Favicon -->
    <link href="{{ asset('frontend-login') }}/assets/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('frontend-login') }}/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="{{ asset('frontend-login') }}/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css"
        rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('frontend-login') }}/assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('frontend-login') }}/assets/img/logo-poliwangi.png" />
</head>

<body class="bg-default">
    <div class="main-content">
        <!-- Header -->
        @include('auth.layouts.header')
        <!-- Page content -->
        @yield('auth-content')
    </div>
    <!--   Core   -->
    <script src="{{ asset('frontend-login') }}/assets/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('frontend-login') }}/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <!--   Argon JS   -->
    <script src="{{ asset('frontend-login') }}/assets/js/argon-dashboard.min.js?v=1.1.2"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "argon-dashboard-free"
            });
    </script>
</body>

</html>
