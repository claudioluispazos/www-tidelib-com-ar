<!DOCTYPE html>
<html lang="es">
  <head> 
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/favicon50x50.png" type="image/x-icon" />
    <title>
      @section('title')
        Tidelib
      @show
    </title>
    @section('estilos')
        <link rel="stylesheet" href="css/estilo.css" />
    @show

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    @section('scripts')
        <script type="text/javascript" src="js/jquery-3.7.1.min.js"> </script>
    @show   
  </head>
  <body>
    @include('header.header')
    @include('carrousel.carrousel')

    @yield('content')

    @include('footer.footer_a')

<script src="js/script.js"></script>
</body>
</html>