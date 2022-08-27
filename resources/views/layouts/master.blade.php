<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BK Politeknik Negeri Banyuwangi</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/css/vendor.bundle.base.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('template') }}/js/select.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/mdi/css/materialdesignicons.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('template') }}/images/logo-poliwangi.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('layouts.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('layouts.sidebar')
            <!-- main-panel -->
            <div class="main-panel">
                <!-- content-wrapper -->
                <div class="content-wrapper">
                    @yield('main')
                </div>
                <!-- content-wrapper ends -->
                <!-- Footer -->
                @include('layouts.footer')
                <!-- End Footer -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!--JS -->
    @yield('javascript')
    <!-- plugins:js -->
    <script src="{{ asset('template') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('template') }}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('template') }}/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('template') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('template') }}/js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('template') }}/js/off-canvas.js"></script>
    <script src="{{ asset('template') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('template') }}/js/template.js"></script>
    <script src="{{ asset('template') }}/js/settings.js"></script>
    <script src="{{ asset('template') }}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('template') }}/js/file-upload.js"></script>
    <script src="{{ asset('template') }}/js/typeahead.js"></script>
    <script src="{{ asset('template') }}/js/select2.js"></script>
    <script src="{{ asset('template') }}/js/dashboard.js"></script>
    <script src="{{ asset('template') }}/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>
