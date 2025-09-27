<div class="d-flex align-items-center m-10" x-data="{ open: false }">
    <!-- Imagen -->
    <img src="<?php echo e(asset('img/icono_generos504x504.png')); ?>" alt="Géneros" class="img-fluid me-3" 
         style="width: 40px; height: 40px; cursor: pointer;"
         @click="open = !open">

    <!-- Lista de Géneros -->
    <div class="d-none d-md-block">
        <ul class="list-unstyled d-flex flex-wrap gap-2">
            <?php $__currentLoopData = $generos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="badge bg-primary"><?php echo e($genero->nombre); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

    <!-- Móvil: Mostrar solo imagen + texto y desplegar géneros -->
    <div class="d-md-none">
        <span class="fw-bold text-primary" @click="open = !open" style="cursor: pointer;">
            Géneros
        </span>
        <ul class="list-unstyled mt-2" x-show="open" x-transition>
            <?php $__currentLoopData = $generos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="badge bg-secondary d-block my-1"><?php echo e($genero->nombre); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php /**PATH /home/claudio/webs/tidelib/resources/views/components/banner-generos.blade.php ENDPATH**/ ?>