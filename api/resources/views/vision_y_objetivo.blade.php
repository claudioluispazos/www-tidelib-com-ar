@extends('layouts.tidelib')

@section('styles')
  @vite(["resources/tidelib/css/vision_ovjetivo.css"])
@endsection

@section('content')
  @include('opciones.vision_y_objetivo')
@endsection