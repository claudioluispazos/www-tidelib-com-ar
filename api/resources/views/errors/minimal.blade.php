@extends('layouts.tidelibmin')

@section('styles')
  @vite([
    'resources/tidelib/css/screen_advertencia.css',
    ])
@endsection
@section('content')
  @yield('code') -  @yield('message')
    <div class="contenedor">
        <div class="bloque_1">
            <img id="barra" src="img/barras_de_advertencia.png" />
        </div>
    <div class="bloque_2">Estás intentando ingresar a un sector restringido. Comuníquese con el área de mantenimiento.
    </div>
        <a href="/">
          <button class="button">SALIR</button>
        </a>
        <div class="bloque_3">
            <img id="barra" src="img/barras_de_advertencia.png" />
        </div>
    </div>
@endsection
