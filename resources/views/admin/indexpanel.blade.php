<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Admin Panel</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Vite Assets -->
    @viteReactRefresh
    @vite(['resources/js/main.jsx', 'resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Preload Fonts (jika ada) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body class="antialiased">
    <div id="app"></div>
    
    <noscript>
        <div class="noscript-warning">
            <h1>JavaScript Required</h1>
            <p>Please enable JavaScript to view this application.</p>
        </div>
    </noscript>

<script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>

</body>
</html>