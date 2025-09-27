<?php $__env->startSection('styles'); ?>
  <?php echo app('Illuminate\Foundation\Vite')([
    'resources/tidelib/css/screen_advertencia.css',
    ]); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <?php echo $__env->yieldContent('code'); ?> -  <?php echo $__env->yieldContent('message'); ?>
    <div class="contenedor">
        <div class="bloque_1">
            <img id="barra" src="img/barras_de_advertencia.png" />
        </div>
    <div class="bloque_2">Estás intentando ingresar a un sector restringido. Comuníquese con el área de mantenimiento.
    </div>
        <a href="/">
          <button class="button">SALIR</button>
        </a>
        <div class="bloque_3">
            <img id="barra" src="img/barras_de_advertencia.png" />
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tidelibmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/claudio/webs/tidelib/resources/views/errors/minimal.blade.php ENDPATH**/ ?>