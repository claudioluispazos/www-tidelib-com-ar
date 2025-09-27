
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['data', 'variant', 'id']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['data', 'variant', 'id']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
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
?>
<style>
    #carouselTidelib {
    min-height: 190px !important; /* Asegura que no se reduzca */
    height: auto !important; /* Evita que Bootstrap lo fuerce */
}
</style>

<div id="<?php echo e($id); ?>" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
    <div class="carousel-inner"></div>
    
    <?php if($variant === 'default'): ?>
        <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo e($id); ?>" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#<?php echo e($id); ?>" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    <?php endif; ?>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Se asume que la función initializeCarousel() está definida en tu archivo JS
        initializeCarousel('<?php echo e($id); ?>', <?php echo json_encode($data, 15, 512) ?>, <?php echo json_encode($options, 15, 512) ?>);
    });
</script>

<!-- Incluir script de inicialización -->
<?php echo app('Illuminate\Foundation\Vite')(['resources/tidelib/js/carousel.js']); ?><?php /**PATH /home/claudio/webs/tidelib/resources/views/components/carousel.blade.php ENDPATH**/ ?>