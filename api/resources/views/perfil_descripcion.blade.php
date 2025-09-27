@extends('layouts.tidelib')

@section('styles')
  @vite(['resources/tidelib/css/perfil_descripcion.css'])'
@endsection
@section('content')
  @include('perfil_descripcion.perfil_descripcion')
@endsection