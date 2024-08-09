<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="light-style layout-wide customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../../../public/"
    data-template="vertical-menu-template-free"
    data-style="light">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link
            rel="icon"
            type="image/x-icon"
            href="{{ asset('img/favicon/favicon.ico?' . rand(10000, 99999)) }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet" />

        <!-- Css -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('vendor/fonts/boxicons.css?' . rand(10000, 99999)) }}" />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('vendor/css/core.css?' . rand(10000, 99999)) }}"
            class="template-customizer-core-css" />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('vendor/css/theme-default.css?' . rand(10000, 99999)) }}"
            class="template-customizer-theme-css" />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('css/demo.css?' . rand(10000, 99999)) }}" />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css?' . rand(10000, 99999)) }}" />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('vendor/css/pages/page-auth.css?' . rand(10000, 99999)) }}" />
        @yield('css')

        <!-- Scripts -->
        <script
            type="text/javascript"
            src="{{ asset('vendor/js/helpers.js?' . rand(10000, 99999)) }}"></script>
        <script
            type="text/javascript"
            src="{{ asset('js/config.js?' . rand(10000, 99999)) }}"></script>
        @yield('js')
        @vite(['resources/sass/app.scss', 'resources/sass/core.scss', 'resources/sass/theme-default.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div id="app-container">
            <main id="main-container">
                @yield('content')
            </main>

            <!-- Charts JS -->
            <script
                type="text/javascript"
                src="{{ asset('vendor/libs/jquery/jquery.js?' . rand(10000, 99999)) }}"></script>
            <script
                type="text/javascript"
                src="{{ asset('vendor/libs/popper/popper.js?' . rand(10000, 99999)) }}"></script>
            <script
                type="text/javascript"
                src="{{ asset('vendor/js/bootstrap.js?' . rand(10000, 99999)) }}"></script>
            <script
                type="text/javascript"
                src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js?' . rand(10000, 99999)) }}"></script>
            <script
                type="text/javascript"
                src="{{ asset('vendor/js/menu.js?' . rand(10000, 99999)) }}"></script>
            <script
                type="text/javascript"
                src="{{ asset('js/main.js?' . rand(10000, 99999)) }}"></script>
            <script
                async
                defer
                src="https://buttons.github.io/buttons.js"></script>
            @yield('javascript')
        </div>
    </body>
</html>
