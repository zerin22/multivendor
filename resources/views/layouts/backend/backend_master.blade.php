<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend') }}/assets/imgs/theme/favicon.svg" />
        <!-- Template CSS -->
        <link href="{{ asset('backend') }}/assets/css/main.css?v=1.1" rel="stylesheet" type="text/css" />
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


        <style>
            .table-responsive {
                min-height: 250px;
            }

            .inative__btn {
                color: #920000;
                background-color: #fdcccc;
                border-color: #fbb3b3;
            }
            .inative__btn:hover {
                color: #920000 !important;
                background-color: #fdcccc;
                border-color: #fbb3b3;
            }
        </style>

    </head>

    <body>
        <div class="screen-overlay"></div>

            @include('layouts.backend.inc.sidebar')

        <main class="main-wrap">

            @include('layouts.backend.inc.header')

            <section class="content-main">

                @yield('content')
            </section>
            <!-- content-main end// -->
            @include('layouts.backend.inc.footer')
    </body>
</html>
