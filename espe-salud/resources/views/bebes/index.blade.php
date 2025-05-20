<!DOCTYPE html>
<html lang="es" x-data="portalBebes()">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Portal Bebés – Espe Salud</title>

  <!-- Tailwind & Alpine.js -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <!-- Icons & Font -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>

  <style>
    @layer utilities {
      .fade-in { animation: fadeIn 0.8s ease-out forwards; opacity:0 }
      .bounce-on-hover:hover { animation: bounce 1s infinite; }
    }
    @keyframes fadeIn { to { opacity:1 } }
    @keyframes bounce { 0%,100% { transform: translateY(0) } 50% { transform: translateY(-5px) } }
    body { font-family:'Inter',sans-serif; }
    .bg-primary { background-color:#005f2f }
    .text-primary { color:#005f2f }
    .bg-secondary { background-color:#dbf5e9 }
    .bg-accent { background-color:#effff4 }
  </style>
</head>
<body class="bg-accent flex flex-col min-h-screen">
  <!-- Header -->
  <header class="bg-primary text-white shadow-lg fade-in" style="animation-delay:0.2s">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-3xl font-bold flex items-center gap-2">
        <i class="fas fa-baby animate-bounce text-2xl"></i> Espe Salud
      </h1>
      <nav>
        <a href="/" class="text-sm hover:text-gray-200 transition">Inicio</a>
      </nav>
    </div>
  </header>

  <!-- Bienvenida -->
  <section class="text-center py-12 px-6 fade-in" style="animation-delay:0.4s">
    <h2 class="text-4xl font-bold text-primary mb-2">¡Bienvenido al portal bebés!</h2>
    <p class="text-gray-700 text-lg max-w-2xl mx-auto">
      Encuentra cuidados, tips y recursos dedicados al bienestar de los más pequeños.<br/>
      Selecciona una categoría para comenzar.
    </p>
  </section>

  <!-- Contenido Principal -->
  <main class="flex-grow max-w-7xl mx-auto p-6 lg:p-12 grid grid-cols-1 md:grid-cols-4 gap-8">
    <!-- Menú Bebés -->
    <nav class="space-y-3 text-base font-semibold fade-in" style="animation-delay:0.6s">
      <template x-for="(item, idx) in items" :key="idx">
        <button
          @click="select(idx)"
          class="w-full text-left px-4 py-2 rounded-lg transition-colors hover:bg-secondary hover:text-primary"
          :class="{'bg-secondary text-primary font-bold': selected===idx}">
          <i :class="item.icon + ' mr-2'"></i>
          <span x-text="item.title"></span>
        </button>
      </template>
    </nav>

    <!-- Detalle Bebés -->
    <section class="md:col-span-3 bg-white rounded-2xl shadow-2xl p-8 bounce-on-hover fade-in" style="animation-delay:0.8s">
      <div class="flex flex-col lg:flex-row gap-6">
        <div class="flex-1">
          <h3 class="text-2xl font-bold text-primary mb-2" x-text="items[selected].title"></h3>
          <div class="w-20 h-1 bg-primary mb-4"></div>
          <p class="text-gray-700 italic mb-4" x-text="items[selected].subtitle"></p>
          <p class="text-gray-800 leading-relaxed" x-text="items[selected].content"></p>
        </div>
        <div class="flex-shrink-0 max-w-xs">
          <img :src="items[selected].image" alt="Imagen bebé" class="w-full h-auto object-cover rounded-lg shadow-md"/>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-primary text-white mt-auto fade-in" style="animation-delay:1s">
    <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col md:flex-row justify-between">
      <p class="text-sm">© 2025 Espe Salud. Todos los derechos reservados.</p>
      <div class="flex gap-4 mt-4 md:mt-0">
        <a href="#" class="hover:underline text-sm">Privacidad</a>
        <a href="#" class="hover:underline text-sm">Términos</a>
      </div>
    </div>
  </footer>

  <script>
    function portalBebes() {
      return {
        selected: 0,
        items: [
          {
            title: 'Cuidados Básicos',
            subtitle: 'Consejos para la higiene',
            content: 'Aprende técnicas de baño, cambio de pañal y cuidado de la piel del bebé.',
            image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgBT2iRQsnzd-qJp1JVMUlWKnsR_wFenM_Vg&s',
            icon: 'fas fa-bath'
          },
          {
            title: 'Nutrición',
            subtitle: 'Alimentación saludable',
            content: 'Información sobre lactancia, introducción de sólidos y dietas balanceadas.',
            image: 'https://img.icons8.com/doodle/480/apple.png',
            icon: 'fas fa-apple-alt'
          },
          {
            title: 'Desarrollo',
            subtitle: 'Hitos y juegos',
            content: 'Actividades y juguetes que estimulan el desarrollo cognitivo y motor.',
            image: 'https://img.icons8.com/doodle/480/puzzle.png',
            icon: 'fas fa-puzzle-piece'
          }
        ],
        select(idx) { this.selected = idx; }
      }
    }
  </script>
</body>
</html>
