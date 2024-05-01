<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>@yield('title') | {{config('app.name', 'Cropium Portfolio')}}</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <!-- CSS StyleSheet -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body>
    <!-- Preloader Starts -->
    @include('frontend.layouts.includes.preloader')

    <!-- Header Area Starts -->
    @include('frontend.layouts.includes.header')

    <main class="main-area">
        @yield('content')
    </main>

    <!-- Footer Area Starts -->
    @include('frontend.layouts.includes.footer')


    <!-- Javascript -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/easing.min.js"></script>
    <script src="assets/js/circle-progressbar.min.js"></script>
    <script src="assets/js/isotop.min.js"></script>
    <script src="assets/js/counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
