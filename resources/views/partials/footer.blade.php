<!DOCTYPE html>
<html lang="es" class="h-full">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetPedia</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen">
  <!-- Footer -->
  <footer class="bg-gray-900 text-white w-full">
    <div class="w-full px-6 py-8 flex flex-col md:flex-row md:justify-between md:items-start">
      <!-- Sección de marca -->
      <div class="mb-6 md:mb-0">
        <a href="#" class="flex items-center">
          <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap">Petpedia</span>
        </a>
        <p class="mt-4 text-sm text-gray-400">La mejor solución para tus proyectos web.</p>
      </div>

      <!-- Secciones de enlaces -->
      <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
        <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-400 uppercase">Recursos</h2>
          <ul class="text-gray-400">
            <li class="mb-4">
              <a href="#" class="hover:underline">Flowbite</a>
            </li>
            <li>
              <a href="#" class="hover:underline">Tailwind CSS</a>
            </li>
          </ul>
        </div>
        <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-400 uppercase">Síguenos</h2>
          <ul class="text-gray-400">
            <li class="mb-4">
              <a href="#" class="hover:underline">GitHub</a>
            </li>
            <li>
              <a href="#" class="hover:underline">Discord</a>
            </li>
          </ul>
        </div>
        <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-400 uppercase">Legal</h2>
          <ul class="text-gray-400">
            <li class="mb-4">
              <a href="#" class="hover:underline">Política de Privacidad</a>
            </li>
            <li>
              <a href="#" class="hover:underline">Términos y Condiciones</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <hr class="my-6 border-gray-700 sm:mx-auto" />

    <div class="w-full px-6 pb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between">
      <span class="text-sm text-gray-400 sm:text-center">© 2022 <a href="#" class="hover:underline">Flowbite™</a>. Todos los derechos reservados.</span>
    </div>
  </footer>

</body>
</html>

