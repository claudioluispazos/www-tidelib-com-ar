@extends('layouts.tidelibmin')

@section('header_content')
  <div class="d-none d-lg-block">@include('components.navbar-desktop')</div>
  <div class="d-none d-md-block d-lg-none">@include('components.navbar-tablet')</div>
  <div class="d-block d-md-none">@include('components.navbar-mobile')</div>
@endsection