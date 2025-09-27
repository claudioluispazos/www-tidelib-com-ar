<div class="d-flex align-items-center m-10" x-data="{ open: false }">
    <!-- Imagen -->
    <img src="{{ asset('img/icono_generos504x504.png') }}" alt="Géneros" class="img-fluid me-3" 
         style="width: 40px; height: 40px; cursor: pointer;"
         @click="open = !open">

    <!-- Lista de Géneros -->
    <div class="d-none d-md-block">
        <ul class="list-unstyled d-flex flex-wrap gap-2">
            @foreach ($generos as $genero)
                <li class="badge bg-primary">{{ $genero->nombre }}</li>
            @endforeach
        </ul>
    </div>

    <!-- Móvil: Mostrar solo imagen + texto y desplegar géneros -->
    <div class="d-md-none">
        <span class="fw-bold text-primary" @click="open = !open" style="cursor: pointer;">
            Géneros
        </span>
        <ul class="list-unstyled mt-2" x-show="open" x-transition>
            @foreach ($generos as $genero)
                <li class="badge bg-secondary d-block my-1">{{ $genero->nombre }}</li>
            @endforeach
        </ul>
    </div>
</div>
