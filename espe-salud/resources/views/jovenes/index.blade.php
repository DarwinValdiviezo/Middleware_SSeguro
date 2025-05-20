<!DOCTYPE html>
<html lang="es" x-data="portalJovenes()">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Portal Jóvenes – Espe Salud</title>

  <!-- Tailwind CSS & Alpine.js -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <!-- Font Awesome & Inter -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />

  <style>
    @layer utilities {
      .fade-in { animation: fadeIn 0.8s ease-out forwards; opacity: 0; }
      .slide-up { animation: slideUp 0.8s ease-out forwards; opacity: 0; }
      .hover-zoom:hover { transform: scale(1.03); }
      .modal-backdrop { background-color: rgba(0,0,0,0.6); }
    }
    @keyframes fadeIn { to { opacity: 1; } }
    @keyframes slideUp { from { transform: translateY(20px); } to { transform: translateY(0); opacity: 1; } }
    body { font-family: 'Inter', sans-serif; }
    .bg-primary { background-color: #005f2f; }
    .text-primary { color: #005f2f; }
    .bg-secondary { background-color: #dbf5e9; }
    .bg-accent { background-color: #effff4; }
  </style>
</head>
<body class="bg-secondary flex flex-col min-h-screen">
  <!-- Header -->
  <header class="bg-primary text-white shadow fade-in" style="animation-delay:0.2s">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-3xl font-bold flex items-center gap-2">
        <i class="fas fa-user-graduate text-2xl animate-pulse"></i> Espe Salud
      </h1>
      <nav><a href="/" class="text-sm hover:underline">Inicio</a></nav>
    </div>
  </header>

  <!-- Welcome -->
  <section class="text-center py-12 px-6 slide-up" style="animation-delay:0.4s">
    <h2 class="text-4xl font-bold text-primary mb-2">¡Bienvenido al portal jóvenes!</h2>
    <p class="text-gray-700 text-lg max-w-2xl mx-auto">
      Servicios, actividades y recursos dinámicos para tu etapa juvenil.<br />Explora y mantente activo.
    </p>
  </section>

  <!-- Content Cards -->
  <main class="flex-grow max-w-7xl mx-auto p-6 lg:p-12 grid grid-cols-1 md:grid-cols-3 gap-8">
    <template x-for="(tab, idx) in tabs" :key="idx">
      <div
        class="bg-white rounded-2xl shadow-lg p-6 text-center hover-zoom transition-transform duration-300 fade-in"
        :style="`animation-delay:${0.6 + idx*0.2}s`">
        <div class="bg-accent p-4 rounded-full mb-4 inline-block">
          <i :class="tab.icon + ' text-primary text-3xl'"></i>
        </div>
        <h3 class="text-xl font-semibold mb-2" x-text="tab.title"></h3>
        <p class="text-gray-600 mb-4" x-text="tab.subtitle"></p>
        <button
          @click="open(idx)"
          class="mt-auto bg-primary text-white px-5 py-2 rounded-md hover:bg-green-800 transition duration-300">
          Conocer más
        </button>
      </div>
    </template>
  </main>

  <!-- Modal -->
  <div x-show="modal" class="fixed inset-0 flex items-center justify-center modal-backdrop" x-transition.opacity>
    <div @click.away="modal = false" class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-6 scale-up" x-transition.scale>
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-2xl font-bold text-primary" x-text="active.title"></h3>
        <button @click="modal = false" class="text-gray-500 hover:text-gray-800">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>
      <p class="text-gray-700 italic mb-4" x-text="active.subtitle"></p>
      <p class="text-gray-800 leading-relaxed mb-6" x-text="active.detail"></p>
      <div class="text-right">
        <button @click="modal = false" class="bg-secondary text-primary px-4 py-2 rounded-md hover:bg-accent transition">
          Cerrar
        </button>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-accent text-gray-700 py-6 mt-auto fade-in" style="animation-delay:1s">
    <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
      <p class="text-sm">© 2025 Espe Salud. Todos los derechos reservados.</p>
      <div class="flex gap-4">
        <a href="#" class="hover:underline text-sm">Privacidad</a>
        <a href="#" class="hover:underline text-sm">Términos</a>
      </div>
    </div>
  </footer>

  <script>
    function portalJovenes() {
      return {
        tabs: [
          { title: 'Deportes', subtitle: 'Mantente activo', detail: 'Encuentra ligas, clases y retos deportivos para fortalecer tu salud física.', icon: 'fas fa-basketball-ball' },
          { title: 'Educación', subtitle: 'Aprende y crece', detail: 'Cursos online, talleres y certificaciones para tu desarrollo profesional.', icon: 'fas fa-chalkboard-teacher' },
          { title: 'Vida Social', subtitle: 'Conecta y participa', detail: 'Eventos, grupos de interés y actividades para ampliar tu red social.', icon: 'fas fa-users' }
        ],
        modal: false,
        active: {},
        open(idx) {
          this.active = this.tabs[idx];
          this.modal = true;
        }
      }
    }
  </script>
</body>
</html>
