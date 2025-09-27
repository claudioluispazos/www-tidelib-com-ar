<div class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" id="{{ $dropdownId }}" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-person-circle"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="{{ $dropdownId }}">
        @auth
            <li><a class="dropdown-item" href="{{-- route('profile') --}}" wire:navigate>Mi cuenta</a></li>
            <li><a class="dropdown-item" href="{{-- route('orders') --}}" wire:navigate>Mis pedidos</a></li>
            <li>
                <button wire:click="logout" class="dropdown-item">Cerrar sesión</button>
            </li>
        @else
            <li><a class="dropdown-item" href="{{ route('login') }}" wire:navigate>Iniciar sesión</a></li>
            <li><a class="dropdown-item" href="{{-- route('register') --}}" wire:navigate>Registro</a></li>
        @endauth
    </ul>
</div>
