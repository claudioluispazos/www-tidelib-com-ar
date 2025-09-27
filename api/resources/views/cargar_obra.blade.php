@extends('layouts.tidelib')

@section('styles')
  <link rel="stylesheet" href="/css/cargar_obra.css" />
@endsection

@section('scripts')
<x-head.tinymce-config/>
@endsection

@section('content')
  @if (Auth::user() && Auth::user()->isAutor())
    @include('opciones.cargar_obra')
  @else
    @include('opciones.cargar_autor')
  @endif
@endsection
