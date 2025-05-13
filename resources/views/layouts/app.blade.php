<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetPedia</title>

  <!-- Bootstrap y FontAwesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      background-color: #f8f9fa;
      background-image: url('https://i.imgur.com/0vGD4ov.png'); /* Fondo de paticas neutro */
      background-repeat: repeat;
      background-size: 120px;
      background-attachment: fixed;
    }

    .content-wrapper {
      flex: 1;
      padding: 20px;
      background-color: rgba(214, 233, 250, 0.85);
      border-radius: 8px;
      margin: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    footer {
      background-color: #343a40;
      color: #fff;
      text-align: center;
      padding: 15px;
    }

    .menu-toggle {
      background-color: #343a40;
      color: #fff;
      border: none;
      padding: 10px 15px;
      font-size: 1.2rem;
      margin: 15px;
      border-radius: 6px;
    }

    .offcanvas {
      background-color: #343a40;
      color: #fff;
    }

    .offcanvas .menu-item {
      display: flex;
      align-items: center;
      padding: 10px 15px;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background 0.3s;
    }

    .offcanvas .menu-item:hover,
    .offcanvas .menu-item.active {
      background-color: #495057;
    }

    .offcanvas .menu-item i {
      margin-right: 10px;
    }

    .offcanvas-header .logo {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 10px;
    }
  </style>
</head>

<body>

  <!-- Botón para mostrar el sidebar -->
  <button class="menu-toggle" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
    <i class="fas fa-bars"></i> Menú
  </button>

  <!-- Sidebar desplegable -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarMenu">
    <div class="offcanvas-header">
      <img src="/api/placeholder/80/80" alt="Logo" class="logo">
      <h5 class="offcanvas-title">PetPedia</h5>
      <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
    </div>
    <div class="offcanvas-body">
      <a href="inicio.html" class="menu-item">
        <i class="fas fa-home"></i> Inicio
      </a>
      <a href="compra.html" class="menu-item">
        <i class="fas fa-shopping-cart"></i> Compra
      </a>
      <a href="veterinaria.html" class="menu-item">
        <i class="fas fa-clinic-medical"></i> Veterinaria
      </a>
      <a href="adopcion.html" class="menu-item">
        <i class="fas fa-paw"></i> Adopciones
      </a>
      <a href="foro.html" class="menu-item active">
        <i class="fas fa-comments"></i> Foro
      </a>
      <a href="#" class="menu-item">
        <i class="fas fa-user"></i> Perfil
      </a>
      <a href="ajustes.html" class="menu-item">
        <i class="fas fa-cog"></i> Configuración
      </a>
    </div>
  </div>

  <!-- Contenido principal -->
  <div class="content-wrapper">
    @yield('content')
  </div>

  @include('includes.footer')

  <!-- JS de Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
