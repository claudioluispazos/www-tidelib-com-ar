@extends('layouts.tidelib')

@section('styles')
  @vite(["resources/tidelib/css/correctores.css"])
@endsection

@section('content')
  @include('opciones.correctores')
@endsection