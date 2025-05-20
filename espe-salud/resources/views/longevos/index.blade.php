<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Portal Longevos – Espe Salud</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Inter Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>

  <style>
    body { font-family: 'Inter', sans-serif; }
    .bg-primary { background-color: #005f2f; }
    .text-primary { color: #005f2f; }
    .bg-secondary { background-color: #dbf5e9; }
    .bg-accent { background-color: #effff4; }
  </style>
</head>
<body class="bg-secondary flex flex-col min-h-screen text-lg">
  <!-- Header simple -->
  <header class="bg-primary text-white py-4">
    <div class="max-w-4xl mx-auto px-6 flex justify-between items-center">
      <h1 class="text-2xl font-bold">Espe Salud</h1>
      <nav>
        <a href="/" class="text-white text-lg hover:underline">Inicio</a>
      </nav>
    </div>
  </header>

  <!-- Bienvenida clara -->
  <section class="text-center py-8 px-4">
    <h2 class="text-3xl font-bold text-primary mb-2">Bienvenido al portal longevos</h2>
    <p class="text-gray-700 mb-6 max-w-3xl mx-auto">
      Información y servicios claros y accesibles para adultos mayores. Todo a la vista, sin clicks innecesarios.
    </p>
  </section>

  <!-- Secciones visibles -->
  <main class="flex-grow max-w-4xl mx-auto px-6 grid grid-cols-1 gap-6 pb-12">
    <!-- Sección Cita -->
    <div class="bg-white rounded-lg border border-gray-300 p-6">
      <h3 class="text-2xl font-semibold mb-2">Citas Médicas</h3>
      <p class="text-gray-800">Programa tu próxima cita de forma sencilla llamando al <strong>123-456-789</strong> o visitando el mostrador de recepción.</p>
    </div>
    <!-- Sección Medicación -->
    <div class="bg-white rounded-lg border border-gray-300 p-6">
      <h3 class="text-2xl font-semibold mb-2">Medicamentos</h3>
      <p class="text-gray-800">Encuentra información sobre tu medicación habitual y calendarios de toma en la sección de Farmacia.</p>
    </div>
    <!-- Sección Actividades -->
    <div class="bg-white rounded-lg border border-gray-300 p-6">
      <h3 class="text-2xl font-semibold mb-2">Actividades</h3>
      <p class="text-gray-800">Participa en talleres de memoria, ejercicios suaves y grupos de conversación en el área de Recreación.</p>
    </div>
    <!-- Sección Contacto -->
    <div class="bg-white rounded-lg border border-gray-300 p-6">
      <h3 class="text-2xl font-semibold mb-2">Contacto de Emergencia</h3>
      <p class="text-gray-800">En caso de urgencia, llama al <strong>987-654-321</strong> o acude directamente al puesto de primeros auxilios.</p>
    </div>
  </main>

  <!-- Footer sencillo -->
  <footer class="bg-accent text-gray-700 py-6">
    <div class="max-w-4xl mx-auto px-6 text-center text-sm">
      © 2025 Espe Salud. Todos los derechos reservados.
    </div>
  </footer>
</body>
</html>
