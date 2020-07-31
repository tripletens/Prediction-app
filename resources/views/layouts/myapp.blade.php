<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Odd Predict</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        
        
        <link rel="icon" href="{{ asset('img/Fevicon.png') }}" type="image/png">

        <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/themify-icons/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/flat-icon/font/flaticon.css') }}">
        
        <link href="{{ asset('css/all.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        @include('const.navbar')
        
        @yield('mycontent')
        
        @include('const.footer')

        <script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('vendors/Magnific-Popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('js/mail-script.js') }}"></script>
        <script src="{{ asset('js/countdown.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/all.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        
    </body>
</html>
