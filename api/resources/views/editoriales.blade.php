@extends('layouts.tidelib')

@section('styles')
  @vite(["resources/tidelib/css/editoriales.css"])
@endsection

@section('content')
  @include('opciones.editoriales')
@endsection