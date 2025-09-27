@if (Auth::user())
    @include('header.perfil_usuario')
@else
    <button><a href="{{ url('login') }}">Iniciar Sesion<a></button>
    <button><a href="{{ url('register') }}">Registrarse<a></button>
@endif

