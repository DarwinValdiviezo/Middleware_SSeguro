<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Espe Salud</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Tus estilos -->
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand text-primary" href="{{ route('age.form') }}">
        ❤️ Espe Salud
      </a>
    </div>
  </nav>

  <main class="hero-section">
    <div class="container">
      @if(session('message'))
        <div class="alert alert-danger text-center">{{ session('message') }}</div>
      @endif

      @yield('content')
    </div>
  </main>
</body>
</html>
