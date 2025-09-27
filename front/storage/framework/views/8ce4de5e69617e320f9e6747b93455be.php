<div class="position-relative">
    <input type="text" class="form-control" placeholder="Buscar libros..." wire:model.live="query">
    <!--[if BLOCK]><![endif]--><?php if($showResults): ?>
        <ul class="list-group position-absolute w-100 mt-1 shadow">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item"><?php echo e($result); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </ul>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div><?php /**PATH /home/claudio/webs/tidelib/resources/views/livewire/search-bar.blade.php ENDPATH**/ ?>