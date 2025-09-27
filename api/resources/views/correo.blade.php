@extends('layouts.tidelib')

@section('styles')
  @vite(["resources/tidelib/css/correo.css"])
@endsection

@section('content')
  @include('opciones.mensajes')
@endsection