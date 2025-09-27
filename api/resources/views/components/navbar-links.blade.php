<ul class="navbar-nav">
    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Escritorio
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="/correo">Mensajes</a></li>
            <li><a class="dropdown-item" href="/correctores">Correctores</a></li>
            <li><a class="dropdown-item" href="/editoriales">Editoriales</a></li>
        </ul>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Novedades
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Nuevo</a></li>
            <li><a class="dropdown-item" href="#">Gratis</a></li>
            <li><a class="dropdown-item" href="#">Pizarra</a></li>
        </ul>
    </li>

    @if (Auth::user())
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Privado
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Historia de compra</a></li>
            @if (Auth::user()->isAutor())
                <li><a class="dropdown-item" href="/libros">Mis Obras</a></li>
                <li><a class="dropdown-item" href="#">Editar publicación</a></li>
                <li><a class="dropdown-item" href="#">Registro de ventas</a></li>
                <li><a class="dropdown-item" href="patrocinar_obra">Patrocina tu obra</a></li>
                <li><a class="dropdown-item" href="#">Agregar tu obra a librería</a></li>
                <li><a class="dropdown-item" href="#">Pizarra</a></li>
                <li><a class="dropdown-item" href="/intercambio">Intercambio</a></li>
            @else
                <li><a class="dropdown-item" href="/cargar_obra">Quiero ser autor</a></li>
            @endif
        </ul>
    </li>
    @endif

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ¿Quiénes somos?
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="vision_y_objetivo">Visión y objetivo</a></li>
            <li><a class="dropdown-item" href="contacto">Contacto</a></li>
        </ul>
    </li>
</ul>
