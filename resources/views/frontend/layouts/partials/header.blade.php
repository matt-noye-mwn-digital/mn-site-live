<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@stack('page-title') - {{ config('settings.site_name', config('Laravel')) }}</title>

        <!-- Meta -->
        {!! SEO::generate() !!}

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

        @vite(['resources/assets/sass/app.scss', 'resources/assets/sass/frontend.scss', 'resources/assets/js/app.js', 'resources/assets/js/frontend.js'])

        @stack('page-scripts')
        @stack('page-styles')

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-LB7YT12K2B"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-LB7YT12K2B');
        </script>

        {!! ReCaptcha::htmlScriptTagJsApi() !!}
    </head>
    <body>
        <header>
            @include('frontend.layouts.partials.navs.mainFrontendNav')
        </header>
        <main>
        @include('sweetalert::alert')
