<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Tidelib - Tienda de Libros'); ?></title>
    <link rel="shortcut icon" href="<?php echo e(asset('img/favicon50x50.png')); ?>" type="image/x-icon">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/scss/app.scss', 'resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <?php echo $__env->yieldContent('styles'); ?>
    <!-- Estilos para el loader -->
    <style>
        #loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }
        .loading-container img {
            width: 60px;
            height: 60px;
        }
    </style>
    </head>
<body>
    <!-- Loader Global -->
    <div id="loading-overlay" wire:loading wire:target="editar" style="display: none;">
        <div class="loading-container">
            <img src="<?php echo e(asset('images/loading.gif')); ?>" alt="Cargando...">
        </div>
    </div>
    <div class="fixed-top">
        <?php echo $__env->yieldContent('header_content'); ?>
    </div>
    <div style="height:60px"></div>
    <main class="container-fliud mt-4">
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo e($slot ?? ''); ?>

    </main>
    
    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p>&copy; 2025 Tidelib - Todos los derechos reservados.</p>
    </footer>
    
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH /home/claudio/webs/tidelib/resources/views/layouts/tidelibmin.blade.php ENDPATH**/ ?>