<?php $__env->startSection('title', 'Inicio - Tidelib'); ?>

<?php $__env->startSection('styles'); ?>
  <?php echo app('Illuminate\Foundation\Vite')([
    'resources/tidelib/css/estilo.css',  
    'resources/tidelib/css/portadas.css',
    'resources/tidelib/css/genero.css',
    'resources/tidelib/css/video.css',
    'resources/tidelib/css/lateral_2.css',
    'resources/tidelib/css/perfil_patrocinio.css',
    ]); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <!-- Carrusel con portadas -->
  <?php if (isset($component)) { $__componentOriginalb2688852c5489493d0123e506be9de3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb2688852c5489493d0123e506be9de3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.carousel','data' => ['data' => $carouselData,'variant' => 'default','id' => 'carouselTidelib']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($carouselData),'variant' => 'default','id' => 'carouselTidelib']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb2688852c5489493d0123e506be9de3b)): ?>
<?php $attributes = $__attributesOriginalb2688852c5489493d0123e506be9de3b; ?>
<?php unset($__attributesOriginalb2688852c5489493d0123e506be9de3b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb2688852c5489493d0123e506be9de3b)): ?>
<?php $component = $__componentOriginalb2688852c5489493d0123e506be9de3b; ?>
<?php unset($__componentOriginalb2688852c5489493d0123e506be9de3b); ?>
<?php endif; ?>

  <!-- Banner de géneros -->
  <?php if (isset($component)) { $__componentOriginal43da6988ca1036a3122adfbf453c25f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal43da6988ca1036a3122adfbf453c25f3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.banner-generos','data' => ['generos' => $generosData]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('banner-generos'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['generos' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($generosData)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal43da6988ca1036a3122adfbf453c25f3)): ?>
<?php $attributes = $__attributesOriginal43da6988ca1036a3122adfbf453c25f3; ?>
<?php unset($__attributesOriginal43da6988ca1036a3122adfbf453c25f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal43da6988ca1036a3122adfbf453c25f3)): ?>
<?php $component = $__componentOriginal43da6988ca1036a3122adfbf453c25f3; ?>
<?php unset($__componentOriginal43da6988ca1036a3122adfbf453c25f3); ?>
<?php endif; ?>

  <!-- Sección de "Los más leídos" -->
  <?php if (isset($component)) { $__componentOriginalb2688852c5489493d0123e506be9de3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb2688852c5489493d0123e506be9de3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.carousel','data' => ['data' => $mostViewedData,'variant' => 'most-viewed','id' => 'carouselMostViewed']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mostViewedData),'variant' => 'most-viewed','id' => 'carouselMostViewed']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb2688852c5489493d0123e506be9de3b)): ?>
<?php $attributes = $__attributesOriginalb2688852c5489493d0123e506be9de3b; ?>
<?php unset($__attributesOriginalb2688852c5489493d0123e506be9de3b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb2688852c5489493d0123e506be9de3b)): ?>
<?php $component = $__componentOriginalb2688852c5489493d0123e506be9de3b; ?>
<?php unset($__componentOriginalb2688852c5489493d0123e506be9de3b); ?>
<?php endif; ?>

  <!-- Listado de libros (zócalo) -->
  <?php if (isset($component)) { $__componentOriginal39751559e76ccdbf550d9a219c1508db = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39751559e76ccdbf550d9a219c1508db = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.libros-list','data' => ['booksData' => $booksData]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('libros-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['booksData' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($booksData)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39751559e76ccdbf550d9a219c1508db)): ?>
<?php $attributes = $__attributesOriginal39751559e76ccdbf550d9a219c1508db; ?>
<?php unset($__attributesOriginal39751559e76ccdbf550d9a219c1508db); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39751559e76ccdbf550d9a219c1508db)): ?>
<?php $component = $__componentOriginal39751559e76ccdbf550d9a219c1508db; ?>
<?php unset($__componentOriginal39751559e76ccdbf550d9a219c1508db); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tidelib', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/claudio/webs/tidelib/resources/views/home.blade.php ENDPATH**/ ?>