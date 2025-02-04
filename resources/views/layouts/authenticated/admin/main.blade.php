<!DOCTYPE html>

<html lang="pt-ao">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>AgriFácil # @yield('pageTitle') </title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('imgs/oficialItel.png') }}">
    <link href="{{ asset('vendor/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/chartist/css/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <script src="{{ asset('swalert/sweetalert2@11.js') }}"></script>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

</head>

<body>

    {{-- preloader --}}
    {{-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> --}}

    <div id="main-wrapper">

        {{-- header --}}
        @include('layouts.authenticated.admin.header')

        {{-- menuL --}}
        @include('layouts.authenticated.admin.menuL')

        {{-- content --}}
        <div class="content-body">
            <div class="container-fluid">
                @include('layouts.authenticated.admin.location')
                @yield('content')
            </div>
        </div>

        {{-- footer --}}
        @include('layouts.authenticated.admin.footer')

    </div>

    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/quixnav-init.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>

    <script src="{{ asset('vendor/chartist/js/chartist.min.js') }}"></script>

    <script src="{{ asset('vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/pg-calendar/js/pignose.calendar.min.js') }}"></script>

    <script src="{{ asset('js/dashboard/dashboard-2.js') }}"></script>

</body>

</html>
