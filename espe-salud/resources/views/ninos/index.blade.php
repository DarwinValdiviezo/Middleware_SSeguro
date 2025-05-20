@extends('layouts.app')

@section('content')
<div class="text-center">
  <h2>Bienvenido al portal de salud para ninos</h2>
  <p>Aquí encontrarás información y servicios específicamente diseñados para tu rango de edad.</p>
</div>
@endsection
<!DOCTYPE html>
<html lang="es" x-data="portalNinos()">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Portal Niños – Espe Salud</title>

  <!-- Tailwind & Alpine.js -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <!-- Font Awesome & Inter -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />

  <style>
    @layer utilities {
      .fade-in { animation: fadeIn 0.8s ease-out forwards; opacity: 0; }
      .bounce-hover:hover { animation: bounce 1s infinite; }
      @keyframes fadeIn { to { opacity: 1; } }
      @keyframes bounce { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-8px); } }
    }
    body { font-family: 'Inter', sans-serif; }
    .bg-primary { background-color: #2a9d8f; }
    .text-primary { color: #2a9d8f; }
    .bg-secondary { background-color: #e0f2f1; }
    .bg-accent { background-color: #f1f8e9; }
  </style>
</head>
<body class="bg-secondary flex flex-col min-h-screen">
  <!-- Header -->
  <header class="bg-primary text-white shadow-lg fade-in" style="animation-delay:0.2s">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-3xl font-bold flex items-center gap-2">
        <i class="fas fa-child text-2xl bounce-hover"></i> Espe Salud Kids
      </h1>
      <nav><a href="/" class="text-sm hover:underline">Inicio</a></nav>
    </div>
  </header>

  <!-- Welcome Banner -->
  <section class="text-center py-12 px-6 fade-in" style="animation-delay:0.4s">
    <h2 class="text-4xl font-bold text-primary mb-4">¡Hola, Exploradores!</h2>
    <p class="text-gray-700 text-lg max-w-2xl mx-auto">
      Descubre juegos, dibujos y consejos divertidos para cuidar tu salud.<br/>¡Elige tu sección y comienza la aventura!
    </p>
  </section>

  <!-- Cards Section -->
  <main class="flex-grow max-w-6xl mx-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    <template x-for="(card, idx) in cards" :key="idx">
      <div class="bg-white rounded-2xl shadow-lg p-6 text-center fade-in" :style="`animation-delay:${0.6+idx*0.2}s`">
        <img :src="card.image" alt="" class="w-20 h-20 mx-auto mb-4 bounce-hover"/>
        <h3 class="text-xl font-semibold mb-2" x-text="card.title"></h3>
        <p class="text-gray-600 mb-4" x-text="card.subtitle"></p>
        <button @click="open(idx)" class="bg-primary text-white px-5 py-2 rounded-md hover:bg-green-700 transition">
          Explorar <i class="fas fa-arrow-right ml-2"></i>
        </button>
      </div>
    </template>
  </main>

  <!-- Modal -->
  <div x-show="modalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" x-transition>
    <div @click.away="modalOpen=false" class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 fade-in" x-transition.scale>
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-2xl font-bold text-primary" x-text="active.title"></h3>
        <button @click="modalOpen=false" class="text-gray-500 hover:text-gray-800">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>
      <p class="text-gray-700 mb-4" x-text="active.content"></p>
      <img :src="active.image" alt="" class="w-full h-auto object-cover rounded-lg"/>
      <div class="mt-4 text-right">
        <button @click="modalOpen=false" class="bg-secondary text-primary px-4 py-2 rounded-md hover:bg-accent transition">
          Cerrar
        </button>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-accent text-gray-700 py-6 mt-auto fade-in" style="animation-delay:1s">
    <div class="max-w-7xl mx-auto px-6 text-center text-sm">
      © 2025 Espe Salud. ¡Aventuras saludables!
    </div>
  </footer>

  <script>
    function portalNinos() {
      return {
        cards: [
          { title: 'Dibujos para Colorear', subtitle: '¡Pinta y aprende!', image: 'https://img.icons8.com/doodle/96/000000/paint-palette.png', content: 'Descarga y colorea tus dibujos favoritos con consejos de salud.' },
          { title: 'Juegos Saludables', subtitle: 'Muévete y juega', image: 'https://img.icons8.com/doodle/96/000000/kids-jumping.png', content: 'Juegos interactivos que enseñan hábitos de vida y ejercicio divertido.' },
          { title: 'Historias Divertidas', subtitle: 'Lee y disfruta', image: 'https://img.icons8.com/doodle/96/000000/open-book.png', content: 'Cuentos animados con mensajes sobre alimentación y cuidado personal.' }
        ],
        modalOpen: false,
        active: {},
        open(idx) {
          this.active = this.cards[idx];
          this.modalOpen = true;
        }
      }
    }
  </script>
</body>
</html>
