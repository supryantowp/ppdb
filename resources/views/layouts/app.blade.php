<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedaftaran Siswa Baru - @yield('head_title', 'PSB')</title>
    <link rel="shortcut icon" href="{{asset('assets/dashboard/assets/images/favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">

    @include('layouts.partial.libs_css')

    @stack('css')
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        @include('layouts.partial.topbar')
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.partial.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('title')

                    @yield('content')
                    <!-- end row -->

                </div> <!-- container-fluid -->

            </div> <!-- content -->

            <footer class="footer">
                © {{Date('Y')}} {{config('app.name')}} - <span class="d-none d-sm-inline-block"> Crafted with <i
                        class="mdi mdi-heart text-danger"></i> by Supryanto</span>.
            </footer>

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    @include('layouts.partial.libs_javascript')

    <!-- App js -->
    <script src="{{asset('assets/dashboard/assets/js/app.js')}}"></script>

    @stack('javascript')

</body>

</html>