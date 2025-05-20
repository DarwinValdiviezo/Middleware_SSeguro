<!DOCTYPE html>
<html lang="es" x-data="portalAdultos()">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Portal Adultos – Espe Salud</title>

  <!-- Tailwind & Alpine.js -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <!-- Font & Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>

  <style>
    @layer utilities {
      .fade-in { animation: fadeIn 0.8s ease-out forwards; opacity:0 }
      .scale-up { animation: scaleUp 0.5s ease-out forwards; opacity:0 }
      .hover-raise:hover { transform: translateY(-5px) scale(1.02); }
      .modal-bg { background-color: rgba(0, 0, 0, 0.5); }
    }
    @keyframes fadeIn { to { opacity:1 } }
    @keyframes scaleUp { from { transform: scale(0.9); opacity:0 } to { transform: scale(1); opacity:1 } }
    body { font-family:'Inter',sans-serif; }
    .bg-primary { background-color:#005f2f }
    .text-primary { color:#005f2f }
    .bg-secondary { background-color:#dbf5e9 }
    .bg-accent { background-color:#effff4 }
  </style>
</head>
<body class="bg-secondary flex flex-col min-h-screen">
  <!-- Header -->
  <header class="bg-primary text-white shadow fade-in" style="animation-delay:0.2s">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold flex items-center gap-2">
        <i class="fas fa-briefcase-medical text-2xl animate-pulse"></i> Espe Salud
      </h1>
      <nav><a href="/" class="text-sm hover:underline">Inicio</a></nav>
    </div>
  </header>

  <!-- Bienvenida -->
  <section class="text-center py-12 px-6 fade-in" style="animation-delay:0.4s">
    <h2 class="text-4xl font-bold text-primary mb-2">Bienvenido al portal Adultos</h2>
    <p class="text-gray-700 text-lg max-w-2xl mx-auto">
      Explora información, servicios y consejos para tu etapa adulta.<br/>Selecciona una categoría para más detalles.
    </p>
  </section>

  <!-- Main Content -->
  <main class="flex-grow max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 p-6 lg:p-12">
    <template x-for="(item, idx) in items" :key="idx">
      <div 
        class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center text-center hover-raise transition-transform duration-300 fade-in"
        :style="`animation-delay:${0.6 + idx*0.2}s`">
        <div class="bg-accent p-4 rounded-full mb-4">
          <i :class="item.icon + ' text-primary text-3xl'"></i>
        </div>
        <h3 class="text-xl font-semibold mb-2" x-text="item.title"></h3>
        <p class="text-gray-600 mb-4" x-text="item.subtitle"></p>
        <button 
          @click="openModal(idx)"
          class="mt-auto bg-primary text-white px-5 py-2 rounded-md hover:bg-green-800 transition duration-300">
          Ver más
        </button>
      </div>
    </template>
  </main>

  <!-- Modal -->
  <div x-show="modalOpen" class="fixed inset-0 flex items-center justify-center modal-bg" x-transition.opacity>
    <div @click.away="closeModal" class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-6 scale-up" x-transition.scale>
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-2xl font-bold text-primary" x-text="activeItem.title"></h3>
        <button @click="closeModal" class="text-gray-500 hover:text-gray-800">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>
      <p class="text-gray-700 italic mb-4" x-text="activeItem.subtitle"></p>
      <p class="text-gray-800 leading-relaxed mb-6" x-text="activeItem.content + ' ' + activeItem.details"></p>
      <div class="text-right">
        <button @click="closeModal" class="bg-secondary text-primary px-4 py-2 rounded-md hover:bg-secondary-dark transition">
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
    function portalAdultos() {
      return {
        items: [
          { title: 'Chequeos Preventivos', subtitle: 'Control regular', icon: 'fas fa-stethoscope', content: 'Realiza revisiones médicas periódicas para mantener tu salud.', details: ' Programa tu cita anual para exámenes completos y monitoreo de indicadores clave.' },
          { title: 'Nutrición Balanceada', subtitle: 'Plan de comidas', icon: 'fas fa-utensils', content: 'Asesoría nutricional para una dieta equilibrada y energética.', details: ' Recibe un plan personalizado, recetas saludables y seguimiento mensual con expertos.' },
          { title: 'Bienestar Mental', subtitle: 'Mindfulness y estrés', icon: 'fas fa-brain', content: 'Técnicas de relajación y manejo del estrés en la vida diaria.', details: ' Participa en sesiones guiadas de meditación y talleres de resiliencia emocional.' }
        ],
        modalOpen: false,
        activeItem: {},
        openModal(idx) {
          this.activeItem = this.items[idx];
          this.modalOpen = true;
        },
        closeModal() {
          this.modalOpen = false;
        }
      }
    }
  </script>
</body>
</html>
