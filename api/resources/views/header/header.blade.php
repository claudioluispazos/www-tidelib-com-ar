
            <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" style="min-width: 300px;">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
          <ul class="navbar-nav mr-0 px-auto d-flex justify-content: center align-items: center">
              @include('header.menu')
          </ul>
          <ul class="navbar-nav mr-auto float: right">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Carrito
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Mi Carrito</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Vaciar</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Usuario
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><a class="dropdown-item" href="#">Mis pedidos</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Salir</a></li>
              </ul>
            </li>
          </ul>
