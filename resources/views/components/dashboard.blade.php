<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Malwaret Alert</title>
    <link rel="stylesheet" href="{{ asset('staradmin') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('staradmin') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('staradmin') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('staradmin') }}/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{ asset('staradmin') }}/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{ asset('staradmin') }}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('staradmin') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ asset('staradmin') }}/js/select.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('staradmin') }}/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="{{ asset('staradmin') }}/images/favicon.png" />
</head>
<body>

  <div class="container-scroller">
    @include('layouts.sidenav')
    <div class="container-fluid page-body-wrapper">
        @include('layouts.rightbar')
        @include('layouts.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="home-tab">
                            @yield('content')
                        </div>
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        </div>
    </div>
  </div>
  <script src="{{ asset('staradmin') }}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('staradmin') }}/vendors/chart.js/Chart.min.js"></script>
  <script src="{{ asset('staradmin') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="{{ asset('staradmin') }}/vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('staradmin') }}/js/off-canvas.js"></script>
  <script src="{{ asset('staradmin') }}/js/hoverable-collapse.js"></script>
  <script src="{{ asset('staradmin') }}/js/template.js"></script>
  <script src="{{ asset('staradmin') }}/js/settings.js"></script>
  <script src="{{ asset('staradmin') }}/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('staradmin') }}/js/dashboard.js"></script>
  <script src="{{ asset('staradmin') }}/js/Chart.roundedBarCharts.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>

  @stack('js')
</body>
</html>
