<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
        <div class="d-flex align-items-center w-100">
            <!-- Bloque LOGO (alineado a la izquierda) -->
            <div class="me-3">
                <?php if (isset($component)) { $__componentOriginalbee47f2da10de7d536a453c12b01ef57 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbee47f2da10de7d536a453c12b01ef57 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar-logo','data' => ['width' => '80']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => '80']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbee47f2da10de7d536a453c12b01ef57)): ?>
<?php $attributes = $__attributesOriginalbee47f2da10de7d536a453c12b01ef57; ?>
<?php unset($__attributesOriginalbee47f2da10de7d536a453c12b01ef57); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbee47f2da10de7d536a453c12b01ef57)): ?>
<?php $component = $__componentOriginalbee47f2da10de7d536a453c12b01ef57; ?>
<?php unset($__componentOriginalbee47f2da10de7d536a453c12b01ef57); ?>
<?php endif; ?>
            </div>
            
            
            <!-- Bloque SEARCH (adaptable al espacio disponible) -->
            <div class="flex-grow-1">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('search-bar');

$__html = app('livewire')->mount($__name, $__params, 'lw-3050496593-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
            
            <!-- Bloque NAVEGACIÓN -->
            <div class="mx-3">
                <?php if (isset($component)) { $__componentOriginal74a328acbd5d6f959967fa0cba9c3c55 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74a328acbd5d6f959967fa0cba9c3c55 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar-links','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar-links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74a328acbd5d6f959967fa0cba9c3c55)): ?>
<?php $attributes = $__attributesOriginal74a328acbd5d6f959967fa0cba9c3c55; ?>
<?php unset($__attributesOriginal74a328acbd5d6f959967fa0cba9c3c55); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74a328acbd5d6f959967fa0cba9c3c55)): ?>
<?php $component = $__componentOriginal74a328acbd5d6f959967fa0cba9c3c55; ?>
<?php unset($__componentOriginal74a328acbd5d6f959967fa0cba9c3c55); ?>
<?php endif; ?>
            </div>
            
            <!-- Bloque ICONOS: CART y USERMENU -->
            <div class="d-flex">
                <?php if (isset($component)) { $__componentOriginald9e9c18dd8520e8d4ea04adb44910de0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald9e9c18dd8520e8d4ea04adb44910de0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar-cart','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar-cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald9e9c18dd8520e8d4ea04adb44910de0)): ?>
<?php $attributes = $__attributesOriginald9e9c18dd8520e8d4ea04adb44910de0; ?>
<?php unset($__attributesOriginald9e9c18dd8520e8d4ea04adb44910de0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald9e9c18dd8520e8d4ea04adb44910de0)): ?>
<?php $component = $__componentOriginald9e9c18dd8520e8d4ea04adb44910de0; ?>
<?php unset($__componentOriginald9e9c18dd8520e8d4ea04adb44910de0); ?>
<?php endif; ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navbar-user', ['dropdownId' => 'userDropdownDesktop']);

$__html = app('livewire')->mount($__name, $__params, 'lw-3050496593-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH /home/claudio/webs/tidelib/resources/views/components/navbar-desktop.blade.php ENDPATH**/ ?>