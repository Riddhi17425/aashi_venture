<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Aashi Venture')
    </title>

    {{-- Bootstrap --}}
    <link rel="stylesheet"
          href="{{ asset('frontend/assets/css/vendor/bootstrap.min.css') }}">

    {{-- Swiper --}}
    <link rel="stylesheet"
          href="{{ asset('frontend/assets/css/vendor/swiper-bundle.min.css') }}">

    {{-- Custom CSS --}}
    <link rel="stylesheet"
          href="{{ asset('frontend/assets/css/animations.css') }}">

    <link rel="stylesheet"
          href="{{ asset('frontend/assets/css/components.css') }}">

    <link rel="stylesheet"
          href="{{ asset('frontend/assets/css/responsive.css') }}">

    <link rel="stylesheet"
          href="{{ asset('frontend/assets/css/style.css') }}">

    @stack('styles')

</head>

<body class="@yield('body-class')">

    {{-- Header --}}
    @include('layouts.header')


    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>


    {{-- Footer --}}
    @include('layouts.footer')


    {{-- Bootstrap --}}
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>

    {{-- Swiper --}}
    <script src="{{ asset('frontend/assets/js/vendor/swiper-bundle.min.js') }}"></script>

    {{-- Custom JS --}}
    <script src="{{ asset('frontend/assets/js/animations.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/app.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/navbar.js') }}"></script>

    @stack('scripts')

</body>

</html>