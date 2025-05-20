<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Error de Validación – Espe Salud</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome & Inter -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>

  <style>
    body { font-family: 'Inter', sans-serif; }
    .bg-primary { background-color: #005f2f; }
    .bg-secondary { background-color: #dbf5e9; }
    .text-error { color: #dc2626; }
    .fade-in { animation: fadeIn 0.6s ease-out forwards; opacity: 0; }
    @keyframes fadeIn { to { opacity: 1; } }
  </style>
</head>
<body class="bg-secondary flex items-center justify-center min-h-screen p-6">
  <div class="bg-white rounded-xl shadow-xl max-w-md w-full text-center p-8 fade-in">
    <i class="fas fa-exclamation-triangle text-error text-4xl mb-4"></i>
    <h2 class="text-2xl font-semibold mb-2">¡Ups! Algo salió mal</h2>
    <p class="text-error mb-6">{{ session('message') }}</p>
    <a href="{{ route('age.form') }}" class="inline-flex items-center justify-center bg-primary text-white font-medium px-6 py-3 rounded-md hover:bg-green-800 transition">
      <i class="fas fa-redo mr-2"></i> Intentar de nuevo
    </a>
  </div>
</body>
</html>
