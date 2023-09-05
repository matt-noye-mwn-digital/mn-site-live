<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@stack('page-title') - {{ config('configurations.app_name', config('app.name')) }}</title>

        <!-- Meta -->
        <meta name="description" content="@stack('page-description')">
        <meta name="keywords" content="@stack('page-keywords')">

        <link rel="canonical" href="{{ config('configurations.app_url', config('app.url')) }}/@stack('page-slug')">

        <!-- Open Graph Stuff -->
        <meta property="og:title" content="@stack('page-title')">
        <meta property="og:description" content="@stack('page-description')">
        <meta property="og:url" content="{{ config('configurations.app_url', config('app.url')) }}/@stack('page-slug')">
        <meta property="og:type" content="@stack('page-type')">
        <meta property="og:site_name" content="{{ config('configurations.app_name', config('app.name')) }}">
        <meta property="og:locale" content="en_GB">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/assets/sass/app.scss', 'resources/assets/sass/login.scss', 'resources/assets/js/app.js'])
    </head>
    <body>
    <main>

        @yield('content')



    </main>
    <footer>
        <div class="footerBottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            Copyright &copy; @php echo date('Y'); @endphp Matt Noye | All Rights Reserved
                        </p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <p>
                            Web Design in Darlington.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </body>
</html>
