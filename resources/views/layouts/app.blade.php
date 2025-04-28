<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') PetPedia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Header -->
    @include('partials.header')

    <!-- Contenido principal -->
    <main class="flex-1 pt-24 pb-16 px-6">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')
</body>
</html>
