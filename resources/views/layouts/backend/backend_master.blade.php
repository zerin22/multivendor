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
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend') }}/assets/imgs/theme/favicon.svg" />
        <!-- Template CSS -->
        <link href="{{ asset('backend') }}/assets/css/main.css?v=1.1" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
