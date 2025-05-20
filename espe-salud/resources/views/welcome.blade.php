<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Espe Salud – Bienvenida</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <!-- Inter Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>

  <style>
    @layer utilities {
      .fade-in { animation: fadeIn 0.8s ease-out forwards; opacity: 0; }
      .slide-up { animation: slideUp 0.8s ease-out forwards; opacity: 0; }
      .pulse-on-hover:hover { animation: pulse 1s infinite; }
    }
    @keyframes fadeIn {
      to { opacity: 1; }
    }
    @keyframes slideUp {
      from { transform: translateY(20px); }
      to { transform: translateY(0); opacity: 1; }
    }
    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }
    body { font-family: 'Inter', sans-serif; }
    /* Paleta corporativa hospitalaria */
    .bg-primary { background-color: #005f2f; }          /* verde oscuro */
    .text-primary { color: #005f2f; }
    .bg-secondary { background-color: #dbf5e9; }        /* verde claro */
    .bg-accent { background-color: #effff4; }           /* lima claro */
  </style>
</head>
<body class="bg-secondary text-gray-800 flex flex-col min-h-screen">
  <!-- Header -->
  <header class="bg-primary text-white shadow-lg fade-in">
    <div class="max-w-7xl mx-auto px-6 lg:px-16 py-4 flex items-center justify-between">
      <h1 class="text-3xl font-bold">Espe Salud</h1>
      <nav class="space-x-6">
        <a href="/" class="text-white hover:text-gray-200 transition-colors duration-300">Inicio</a>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <main class="flex-grow max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 py-12 flex flex-col lg:flex-row items-center justify-between gap-10">
    <!-- Sección de texto y botón -->
    <section class="flex flex-col max-w-xl w-full slide-up" style="animation-delay:0.3s">
      <span class="inline-block bg-accent text-primary font-semibold text-sm rounded-full px-5 py-2 mb-6 w-max">
        New Collection 2025
      </span>

      <h1 class="text-3xl sm:text-4xl font-semibold leading-tight text-primary mb-6">
        Bienvenido a Espe Salud<br/>
        <span class="underline decoration-primary decoration-4 underline-offset-8">
          Clasificación por Edad
        </span>
      </h1>

      <p class="text-gray-700 text-base sm:text-lg mb-10 max-w-md">
        Antes de continuar, haz clic en el botón para ingresar tu edad y recibir contenidos adecuados a tu rango etario.
      </p>

      <div class="mb-12 slide-up" style="animation-delay:0.6s">
        <a href="{{ route('age.form') }}" class="bg-primary text-white font-semibold px-6 py-3 rounded-md flex items-center justify-center w-full hover:bg-green-800 transition-colors duration-300 pulse-on-hover">
          Empezar <i class="fas fa-arrow-right ml-2"></i>
        </a>
      </div>
    </section>

    <!-- Sección de imagen flotante -->
    <section class="relative flex-shrink-0 max-w-md w-full hidden md:block fade-in" style="animation-delay:0.9s">
      <img alt="Portal Salud" class="w-full h-auto object-contain rounded-lg shadow-2xl"
           src="https://storage.googleapis.com/a1aa/image/557ee9cc-5747-4d38-2cc9-e8c168c12038.jpg"/>

      <div class="absolute top-16 left-0 bg-white rounded-xl shadow-lg px-4 py-3 flex items-center gap-4 max-w-xs slide-up" style="animation-delay:1.2s">
        <i class="fas fa-user-nurse text-primary text-2xl"></i>
        <div>
          <p class="text-gray-800 text-sm">Orientación Previa</p>
          <p class="text-primary font-bold text-base mt-1">Filtrado por edad</p>
        </div>
      </div>

      <div class="absolute top-10 right-10 bg-primary text-white rounded-full w-16 h-16 flex flex-col items-center justify-center font-bold text-sm pulse-on-hover" style="animation-delay:1.5s">
        <span class="text-xl">✓</span>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-accent text-gray-700 mt-6 fade-in" style="animation-delay:1.8s">
    <div class="max-w-7xl mx-auto px-6 lg:px-16 py-6 flex flex-col md:flex-row items-center justify-between">
      <p class="text-sm">© 2025 Espe Salud. Todos los derechos reservados.</p>
      <div class="flex gap-4 mt-4 md:mt-0">
        <a href="#" class="hover:underline text-sm">Política de Privacidad</a>
        <a href="#" class="hover:underline text-sm">Términos de Uso</a>
      </div>
    </div>
  </footer>
</body>
</html>
