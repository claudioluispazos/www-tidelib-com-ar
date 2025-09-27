<div class="libros-list row g-4">
        <?php $__currentLoopData = $booksData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div clase="card book-card h-100">
                    <?php if($libro->patrocinado): ?>
                        <?php if (isset($component)) { $__componentOriginal5ce9a53870abae4c31705d2cff19449b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5ce9a53870abae4c31705d2cff19449b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tarjeta-patrocinio','data' => ['libro' => $libro]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('tarjeta-patrocinio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['libro' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($libro)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5ce9a53870abae4c31705d2cff19449b)): ?>
<?php $attributes = $__attributesOriginal5ce9a53870abae4c31705d2cff19449b; ?>
<?php unset($__attributesOriginal5ce9a53870abae4c31705d2cff19449b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5ce9a53870abae4c31705d2cff19449b)): ?>
<?php $component = $__componentOriginal5ce9a53870abae4c31705d2cff19449b; ?>
<?php unset($__componentOriginal5ce9a53870abae4c31705d2cff19449b); ?>
<?php endif; ?>
                    <?php else: ?>
                        <?php if (isset($component)) { $__componentOriginala597dffd8fc1eea5633c768c5a6639ae = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala597dffd8fc1eea5633c768c5a6639ae = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tarjeta-perfil','data' => ['libro' => $libro]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('tarjeta-perfil'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['libro' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($libro)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala597dffd8fc1eea5633c768c5a6639ae)): ?>
<?php $attributes = $__attributesOriginala597dffd8fc1eea5633c768c5a6639ae; ?>
<?php unset($__attributesOriginala597dffd8fc1eea5633c768c5a6639ae); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala597dffd8fc1eea5633c768c5a6639ae)): ?>
<?php $component = $__componentOriginala597dffd8fc1eea5633c768c5a6639ae; ?>
<?php unset($__componentOriginala597dffd8fc1eea5633c768c5a6639ae); ?>
<?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH /home/claudio/webs/tidelib/resources/views/components/libros-list.blade.php ENDPATH**/ ?>