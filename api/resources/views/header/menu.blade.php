  <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
  <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Escritorio</a>
    <ul class="dropdown-menu">
      <li class="nav-item"><a class="nav-link dropdown-item" href="/correo">Mensajes</a></li>
      <li class="nav-item"><a class="nav-link dropdown-item" href="/correctores">Correctores</a></li>
      <li class="nav-item"><a class="nav-link dropdown-item" href="/editoriales">Editoriales</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Novedades</a>
    <ul class="dropdown-menu">
      <li class="nav-item"><a class="nav-link" href="#">Nuevo</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Gratis</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Pizarra</a></li>
      <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Novedades</a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a class="nav-link" href="#">Nuevo</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Gratis</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Pizarra</a></li>
        </ul>
      </li>
    </ul>
  </li>
  @if (Auth::user())
  <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Privado</a>
    <ul class="dropdown-menu">
      <li class="nav-item"><a class="nav-link" href="#">Historia de compra</a></li>
      @if (Auth::user()->isAutor())
      <li class="nav-item"><a class="nav-link" href="/cargar_obra">Carga tu obra</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Editar publicación</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Registro de ventas</a></li>
      <li class="nav-item"><a class="nav-link" href="patrocinar_obra">Patrocina tu obra</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Agrera tu obra a librería</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Pizarra</a></li>
      <li class="nav-item"><a class="nav-link" href="/intercambio">Intercambio</a></li>
      @else
      <li class="nav-item"><a class="nav-link" href="/cargar_obra">Quiero ser autor</a></li>
      @endif
    </ul>
  </li>
  @endif
  <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Quienes somos</a>
    <ul class="dropdown-menu">
      <li class="nav-item"><a class="nav-link" href="vision_y_objetivo">Visión y objetivo</a></li>
      <li class="nav-item"><a class="nav-link" href="contacto">Contacto</a></li>
    </ul>
  </li>
