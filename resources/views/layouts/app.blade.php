<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>
    
    <meta name="description" content="@yield('description', 'Welcome to ' . config('app.name'))">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <!-- Additional Styles -->
    @stack('styles')
    
    <style>
        body {
            padding-top: 76px; /* Account for fixed navbar */
        }
        .navbar-brand {
            font-size: 1.5rem;
            color: #4f46e5 !important;
        }
        .nav-link.active {
            color: #4f46e5 !important;
        }
        footer a:hover {
            color: #fff !important;
            transition: color 0.3s ease;
        }
        footer .fab {
            font-size: 1.25rem;
        }
    </style>
</head>
<body>
    <div id="app">
        @include('pages.web.includes.header')

        <main>
            @yield('content')
        </main>

        @include('pages.web.includes.footer')
    </div>
    
    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>
