<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
        <div class="d-flex align-items-center w-100">
            <!-- Bloque LOGO (alineado a la izquierda) -->
            <div class="me-3">
                <x-navbar-logo width="80" />
            </div>
            
            
            <!-- Bloque SEARCH (adaptable al espacio disponible) -->
            <div class="flex-grow-1">
                @livewire('search-bar')
            </div>
            
            <!-- Bloque NAVEGACIÓN -->
            <div class="mx-3">
                <x-navbar-links />
            </div>
            
            <!-- Bloque ICONOS: CART y USERMENU -->
            <div class="d-flex">
                <x-navbar-cart />
                @livewire('navbar-user', ['dropdownId' => 'userDropdownDesktop'])
            </div>
        </div>
    </div>
</nav>
