<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/img/logo.ico">
    <title>{{ $title }} - SiTEQU</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- SELECTPICKER -->
    <link rel="stylesheet" href="/css/bootstrap-select/bootstrap-select.css">
    <link rel="stylesheet" href="/plugins/toastr/toastr.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        @include('partials.navbar')

        @include('partials.sidebar')

        @yield('content')

        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} All rights
                reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SELECT PICKER -->
    <script src="/js/bootstrap-select/bootstrap-select.js"></script>
    <script src="/js/select/defaults-id_ID.min.js"></script>
    <script src="/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/js/adminlte.min.js"></script>

    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "showIcon": false,
            }
            toastr.info("{{ session('message') }}");
        @endif
    </script>
</body>

</html>
