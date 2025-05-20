<!DOCTYPE html>
<html lang="es" x-data="portalMayores()">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Portal Mayores – Espe Salud</title>

  <!-- Tailwind & Alpine.js -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <!-- Font & Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>

  <style>
    @layer utilities {
      .fade-in { animation: fadeIn 0.8s ease-out forwards; opacity: 0; }
      .accordion-open > .answer { max-height: 200px; padding: 1rem; }
      .answer { max-height: 0; overflow: hidden; transition: max-height 0.3s ease; }
      .hover-highlight:hover { background-color: #effff4; }
    }
    @keyframes fadeIn { to { opacity: 1; } }
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
        <i class="fas fa-user-md text-2xl animate-pulse"></i> Espe Salud
      </h1>
      <nav><a href="/" class="text-sm hover:underline">Inicio</a></nav>
    </div>
  </header>

  <!-- Welcome -->
  <section class="text-center py-12 px-6 fade-in" style="animation-delay:0.4s">
    <h2 class="text-4xl font-bold text-primary mb-2">Bienvenido al portal Mayores</h2>
    <p class="text-gray-700 text-lg max-w-2xl mx-auto">
      Recursos y servicios avanzados para el bienestar de adultos mayores.<br />Explora cada sección a través del menú desplegable.
    </p>
  </section>

  <!-- Accordion Menu -->
  <main class="flex-grow max-w-2xl mx-auto px-6 lg:px-0 py-8">
    <template x-for="(item, idx) in items" :key="idx">
      <div class="bg-white rounded-2xl shadow-lg mb-4 fade-in" style="animation-delay:calc(0.6s + 0.2s * idx)">
        <button @click="toggle(idx)" class="w-full flex justify-between items-center p-4 hover-highlight transition">
          <span class="text-xl font-semibold" x-text="item.title"></span>
          <i :class="{'fas fa-chevron-down': !item.open, 'fas fa-chevron-up': item.open}"></i>
        </button>
        <div class="answer px-4 bg-accent text-gray-800" x-bind:class="{'accordion-open': item.open}">
          <p x-text="item.content"></p>
        </div>
      </div>
    </template>
  </main>

  <!-- Footer -->
  <footer class="bg-accent text-gray-700 py-6 mt-auto fade-in" style="animation-delay:1s">
    <div class="max-w-7xl mx-auto px-6 flex justify-center text-sm">
      © 2025 Espe Salud. Todos los derechos reservados.
    </div>
  </footer>

  <script>
    function portalMayores() {
      return {
        items: [
          { title: 'Programas de Salud', content: 'Accede a programas de ejercicio suave, monitorización remota y consultas especializadas.', open: false },
          { title: 'Medicamentos', content: 'Revisa tu historial de medicamentos, fechas de retiro y alertas de dosis.', open: false },
          { title: 'Soporte Técnico', content: 'Guías simplificadas para usar el portal y asistencia telefónica personalizada.', open: false },
          { title: 'Comunidad', content: 'Únete a grupos de conversación y actividades virtuales para mantenerte conectado.', open: false }
        ],
        toggle(idx) {
          this.items[idx].open = !this.items[idx].open;
        }
      }
    }
  </script>
</body>
</html>