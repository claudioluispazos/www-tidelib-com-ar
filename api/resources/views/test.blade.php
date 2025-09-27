@extends('base')

@section('content')
    @include('banner_generos.banner')
    @include('videos.v1')
    @include('portada_circular.portadas_c')
    @include('zocalo_derecha.derecha')
@endsection

@section('title')
    @parent
    -  esto que pongo
@endsection

@section('estilos')
    @parent
    <link rel="stylesheet" href="css/portadas.css" />
    <link rel="stylesheet" href="css/genero.css" />
    <link rel="stylesheet" href="css/video.css" />
    <link rel="stylesheet" href="css/lateral_2.css" />
    <link rel="stylesheet" href="css/perfil_patrocinio.css" />
@endsection

@section('scripts')
    @parent
    <script>
      $(function() {
          $(window).scroll(function() {
              var scroll = $(window).scrollTop();
              if (scroll > 236) {
                  $('.banner_generos').addClass('banner_sticky');
                  $('.banner_generos2').addClass('banner_sticky');
                  $('.lateral').addClass('lateral_sticky');
              } else  {
                  $('.banner_generos').removeClass('banner_sticky');
                  $('.banner_generos2').removeClass('banner_sticky');
                  $('.lateral').removeClass('lateral_sticky');
              }

              nuevoalto=$(window).height()-$('.lateral').offset().top+$(window).scrollTop();
              posfooter=$('.footer').offset().top-$(window).height()-$(window).scrollTop();
              if (posfooter<0) nuevoalto+=posfooter;
//              $('.lateral').css('height', nuevoalto+'px');
          });
/*          $('.lateral').hover(function() {
              $('.titulo_lateral').show();
              $('.encabezado_los_mas_leido').show();
          });
          $('.lateral').mouseleave(function() {
              $('.titulo_lateral').hide();
              $('.encabezado_los_mas_leido').hide();
              
          });*/
      });
    </script>
@endsection