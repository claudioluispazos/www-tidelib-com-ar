<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Tidelib')</title>
  @vite(['resources/scss/app.scss'])
  @vite(['resources/js/app.js'])

  @yield('styles')

  @yield('scripts')
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a href="/"><img id="imglogo" class="img-thumbnail" width="100" src="{{ asset('/img/t_roja_fondo_gis_2.png') }}" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          @yield('header_content')
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="container">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      </div>
      @yield('content')
      <table class="table">
      </table>
    </div>
  </main>

  @include('footer.footer_a')

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-bottom" id="navbarMobile">
    <div class="container-fluid">
    </div>
  </nav>

  <script>
    // JavaScript para mostrar/ocultar el menú móvil
    const navbarMobile = document.getElementById('navbarMobile');
    // ... lógica para mostrar/ocultar el menú basado en el tamaño de la pantalla
  </script>
</body>

</html>

