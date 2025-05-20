<!DOCTYPE html>
<html lang="es" x-data="portal()">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Portal Adolescentes – Espe Salud</title>

  <!-- Tailwind & Alpine.js -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <!-- Icons & Font -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>

  <style>
    @layer utilities {
      .fade-in { animation: fadeIn 0.8s ease-out forwards; opacity: 0; }
      .slide-left { animation: slideLeft 0.8s ease-out forwards; opacity: 0; }
      .hover-pop:hover { transform: translateY(-5px) scale(1.02); }
    }
    @keyframes fadeIn { to { opacity: 1; } }
    @keyframes slideLeft { from { transform: translateX(20px); } to { transform: translateX(0); opacity: 1; } }
    body { font-family: 'Inter', sans-serif; }
    .bg-primary { background-color: #005f2f; }
    .text-primary { color: #005f2f; }
    .bg-secondary { background-color: #dbf5e9; }
    .bg-accent { background-color: #effff4; }
  </style>
</head>
<body class="bg-secondary flex flex-col min-h-screen">
  <!-- Header -->
  <header class="bg-primary text-white shadow-lg fade-in" style="animation-delay:0.2s">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-3xl font-bold flex items-center gap-2">
        <i class="fas fa-heartbeat animate-pulse text-2xl"></i> Espe Salud
      </h1>
      <nav>
        <a href="/" class="text-sm hover:text-gray-200 transition">Inicio</a>
      </nav>
    </div>
  </header>

  <!-- Welcome -->
  <section class="text-center py-12 px-6 slide-left" style="animation-delay:0.4s">
    <h2 class="text-4xl font-bold text-primary mb-2">¡Bienvenido al portal Adolescente!</h2>
    <p class="text-gray-700 text-lg max-w-2xl mx-auto">
      Descubre servicios, recursos y actividades diseñados especialmente para tu etapa.<br/>
      Explora las secciones y encuentra lo que necesitas.
    </p>
  </section>

  <!-- Main Content -->
  <main class="flex-grow max-w-7xl mx-auto p-6 lg:p-12 grid grid-cols-1 md:grid-cols-4 gap-8">

    <!-- Tabs Lateral -->
    <nav class="space-y-3 text-base font-medium fade-in" style="animation-delay:0.6s">
      <template x-for="(item, idx) in tabs" :key="idx">
        <button
          @click="select(idx)"
          class="w-full text-left px-4 py-2 rounded-md transition-colors hover:bg-accent hover:text-primary"
          :class="{'bg-accent text-primary font-semibold': selected===idx}">
          <i :class="item.icon + ' mr-2'"></i>
          <span x-text="item.title"></span>
        </button>
      </template>
    </nav>

    <!-- Tab Content -->
    <section class="md:col-span-3 bg-white rounded-2xl shadow-2xl p-8 fade-in hover-pop" style="animation-delay:0.8s">
      <div class="flex flex-col lg:flex-row gap-6">
        <div class="flex-1">
          <h3 class="text-2xl font-bold text-primary mb-2" x-text="tabs[selected].title"></h3>
          <div class="w-20 h-1 bg-primary mb-4"></div>
          <p class="text-gray-700 italic mb-4" x-text="tabs[selected].subtitle"></p>
          <p class="text-gray-800 leading-relaxed" x-text="tabs[selected].content"></p>
        </div>
        <div class="flex-shrink-0 max-w-xs">
          <img :src="tabs[selected].image" alt="Imagen" class="w-full h-auto object-cover rounded-lg shadow-lg"/>
        </div>
      </div>
    </section>

  </main>

  <!-- Footer -->
  <footer class="bg-accent text-gray-700 mt-auto fade-in" style="animation-delay:1s">
    <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col md:flex-row justify-between">
      <p class="text-sm">© 2025 Espe Salud. Todos los derechos reservados.</p>
      <div class="flex gap-4 mt-4 md:mt-0">
        <a href="#" class="hover:underline text-sm">Privacidad</a>
        <a href="#" class="hover:underline text-sm">Términos</a>
      </div>
    </div>
  </footer>

  <script>
    function portal() {
      return {
        selected: 0,
        tabs: [
          {
            title: 'Actividades Grupales',
            subtitle: '¡Conéctate con tus pares!',
            content: 'Talleres interactivos, debates y retos grupales para fortalecer tus habilidades sociales.',
            image: 'https://storage.googleapis.com/a1aa/image/d72f248b-b559-4a28-edf8-43814efef229.jpg',
            icon: 'fas fa-users'
          },
          {
            title: 'Recursos Dinámicos',
            subtitle: 'Aprendizaje gamificado',
            content: 'Videos, quizzes y juegos educativos que hacen tu aprendizaje más entretenido.',
            image: 'https://storage.googleapis.com/a1aa/image/557ee9cc-5747-4d38-2cc9-e8c168c12038.jpg',
            icon: 'fas fa-gamepad'
          },
          {
            title: 'Salud Integral',
            subtitle: 'Cuida tu cuerpo y mente',
            content: 'Rutinas de ejercicio, consejos nutricionales y técnicas de mindfulness para tu bienestar.',
            image: 'https://storage.googleapis.com/a1aa/image/1d45e235-b702-43a8-6577-5da5282beb6e.jpg',
            icon: 'fas fa-heartbeat'
          }
        ],
        select(idx) { this.selected = idx; }
      }
    }
  </script>
</body>
</html>
