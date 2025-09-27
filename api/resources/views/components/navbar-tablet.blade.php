<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
        <!-- Bloque superior: LOGO, SEARCH, CART y botón de hamburguesa -->
        <div class="d-flex align-items-center w-100">
            <!-- LOGO (ajustado para tablet) -->
            <div>
                <x-navbar-logo width="80" />
            </div>
            <!-- SEARCH: ocupa el espacio disponible -->
            <div class="flex-grow-1 mx-2">
                @livewire('search-bar')
            </div>
            <!-- ICONO CART -->
            <div>
                <x-navbar-cart />
            </div>
            <!-- Botón de HAMBURGUER -->
            <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTablet" aria-controls="navbarTablet" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- Contenido colapsable: se mostrará al pulsar la hamburguesa -->
        <div class="collapse w-100" id="navbarTablet">
            <div class="mt-2">
                <!-- Primera fila: Bloque para CART y USER, alineado a la derecha -->
                <div class="w-100 d-flex justify-content-end align-items-center">
                    <div class="ms-2">
                        @livewire('navbar-user', ['dropdownId' => 'userDropdownTablet'])
                    </div>
                </div>
                <!-- Segunda fila: Menú de navegación, alineado a la izquierda -->
                <div class="w-100 mt-2">
                    <div class="text-start">
                        <x-navbar-links />
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
