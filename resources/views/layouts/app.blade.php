<!DOCTYPE html>
<html lang="es"> <!-- Cambiado a "es" ya que tu app parece en español -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layout 1</title>
    
    <!-- Bootstrap CSS (versión única) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome (versión única) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Bootstrap Icons (versión única) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    @include('includes.navbar')
    @include('includes.sidebar')
    
    <div class="container mt-4">
        @yield('content')
    </div>
    
    <!-- Footer -->
    @include('includes.footer')

    <!-- Bootstrap JS (al final del body para mejor rendimiento) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>