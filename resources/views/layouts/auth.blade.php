<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedaftaran Siswa Baru - @yield('head_title', 'PSB')</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />

    @include('layouts.partial.libs_css')
</head>

<body>

    <!-- Begin page -->
    <div class="wrapper-page">

        @yield('content')

    </div>


    @include('layouts.partial.libs_javascript')

</body>

</html>