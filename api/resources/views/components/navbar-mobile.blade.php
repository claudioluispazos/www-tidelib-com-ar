<nav class="navbar navbar-dark bg-danger">
    <div class="container-fluid">
        <!-- Header siempre visible: LOGO | SEARCH | HAMBURGUER -->
        <div class="d-flex align-items-center w-100">
            <!-- LOGO -->
            <div>
                <x-navbar-logo width="80" />
            </div>
            <!-- SEARCH: ocupa el espacio disponible -->
            <div class="flex-grow-1 mx-2">
                @livewire('search-bar')
            </div>
            <!-- Botón de HAMBURGUER -->
            <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMobile" aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- Panel colapsable -->
        <div class="collapse w-100" id="navbarMobile">
            <div class="mt-2">
                <!-- Primera fila: Bloque para CART y USER, alineado a la derecha -->
                <div class="w-100 d-flex justify-content-end align-items-center">
                    <x-navbar-cart />
                    <div class="ms-2">
                        @livewire('navbar-user', ['dropdownId' => 'userDropdownMobile'])
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
