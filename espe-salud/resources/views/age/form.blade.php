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
      .fade-in { animation: fadeIn 0.8s ease-out; }
      .pulse-on-hover:hover { animation: pulse 1s infinite; }
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
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
  <header class="bg-primary text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-6 lg:px-16 py-4 flex items-center justify-between">
      <h1 class="text-2xl font-bold fade-in">Espe Salud</h1>
      <nav class="space-x-6">
        <a href="/" class="text-white hover:text-gray-200 transition-colors duration-300">Inicio</a>
      </nav>
    </div>
  </header>

  <!-- Age Input Section -->
  <main class="bg-secondary flex justify-center items-center flex-grow p-6">
    <div class="max-w-md w-full text-center bg-white rounded-2xl shadow-2xl p-10 fade-in">
      <h2 class="text-primary font-bold text-3xl mb-4 border-b-2 border-dashed border-primary pb-2">
        Ingrese su edad
      </h2>
      <p class="text-gray-700 mb-6 text-base">
        Para continuar, escribe tu edad (0–120 años) y pulsa Enviar.
      </p>
      <form action="{{ route('age.process') }}" method="POST" class="flex rounded-full border border-gray-300 overflow-hidden focus-within:shadow-outline">
        @csrf
        <input
          type="number"
          name="age"
          min="0"
          max="120"
          required
          placeholder="Tu edad"
          class="flex-grow px-6 py-4 text-gray-800 placeholder-gray-500 focus:outline-none focus:bg-accent transition-colors duration-300"
        />
        <button
          type="submit"
          class="bg-primary text-white font-semibold px-8 py-4 rounded-r-full hover:bg-green-800 transition-colors duration-300 pulse-on-hover flex items-center gap-2"
        >
          Enviar <i class="fas fa-arrow-right"></i>
        </button>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-accent text-gray-700 mt-6">
    <div class="max-w-7xl mx-auto px-6 lg:px-16 py-6 flex flex-col md:flex-row items-center justify-between">
      <p class="text-sm fade-in">© 2025 Espe Salud. Todos los derechos reservados.</p>
      <div class="flex gap-4 mt-4 md:mt-0 fade-in">
        <a href="#" class="hover:underline text-sm">Política de Privacidad</a>
        <a href="#" class="hover:underline text-sm">Términos de Uso</a>
      </div>
    </div>
  </footer>
</body>
</html>
