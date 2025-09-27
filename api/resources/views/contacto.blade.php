@extends('layouts.tidelib')

@section('styles')
  @vite(["resources/tidelib/css/contacto.css"])
@endsection

@section('content')
  @include('opciones.contacto')
@endsection