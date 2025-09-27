@extends('layouts.tidelib')

@section('title', 'Inicio - Tidelib')

@section('styles')
  @vite([
    'resources/tidelib/css/estilo.css',  
    'resources/tidelib/css/portadas.css',
    'resources/tidelib/css/genero.css',
    'resources/tidelib/css/video.css',
    'resources/tidelib/css/lateral_2.css',
    'resources/tidelib/css/perfil_patrocinio.css',
    ])
@endsection
@section('content')
  <!-- Carrusel con portadas -->
  <x-carousel :data="$carouselData" variant="default" id="carouselTidelib" />

  <!-- Banner de géneros -->
  <x-banner-generos :generos="$generosData" />

  <!-- Sección de "Los más leídos" -->
  <x-carousel :data="$mostViewedData" variant="most-viewed" id="carouselMostViewed" />

  <!-- Listado de libros (zócalo) -->
  <x-libros-list :booksData="$booksData" />
@endsection
