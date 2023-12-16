<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@stack('page-title') - {{ config('settings.site_name', config('Laravel')) }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

        <!-- Scripts & Styles -->
        @vite(['resources/assets/sass/app.scss', 'resources/assets/sass/admin.scss', 'resources/assets/js/app.js', 'resources/assets/js/admin.js'])

        <x-head.tinymce-config/>
        @stack('page-styles')
        @stack('page-scripts')
    </head>
    <body>
        @include('sweetalert::alert')
        @include('admin.layouts.partials.navs.topBarNav')
        <div class="adminWrapper">
            @include('admin.layouts.partials.sidebar')
            <main class="adminMain">
