{{-- resources/views/components/carousel.blade.php --}}
@props(['data', 'variant', 'id'])

@php
    $options = [];
    if ($variant === 'default') {
        $options = [
            'minWidthPerItem' => 120,
            'minHeightPerItem' => 100,
            'padding' => '0.5rem',
            'variant' => 'default'
        ];
    } elseif ($variant === 'most-viewed') {
        $options = [
            'minWidthPerItem' => 55,
            'fixedSize' => 55,
            'fixedHeight' => 60,  // Ajusta este valor según tu diseño
            'padding' => '0.3rem',
            'variant' => 'most-viewed'
        ];
    }
@endphp
<style>
    #carouselTidelib {
    min-height: 190px !important; /* Asegura que no se reduzca */
    height: auto !important; /* Evita que Bootstrap lo fuerce */
}
</style>

<div id="{{ $id }}" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
    <div class="carousel-inner"></div>
    
    @if ($variant === 'default')
        <button class="carousel-control-prev" type="button" data-bs-target="#{{ $id }}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#{{ $id }}" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    @endif
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Se asume que la función initializeCarousel() está definida en tu archivo JS
        initializeCarousel('{{ $id }}', @json($data), @json($options));
    });
</script>

<!-- Incluir script de inicialización -->
@vite(['resources/tidelib/js/carousel.js'])