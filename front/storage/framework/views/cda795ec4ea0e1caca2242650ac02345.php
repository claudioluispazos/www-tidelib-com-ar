<div class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" id="<?php echo e($dropdownId); ?>" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-person-circle"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="<?php echo e($dropdownId); ?>">
        <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
            <li><a class="dropdown-item" href="" wire:navigate>Mi cuenta</a></li>
            <li><a class="dropdown-item" href="" wire:navigate>Mis pedidos</a></li>
            <li>
                <button wire:click="logout" class="dropdown-item">Cerrar sesión</button>
            </li>
        <?php else: ?>
            <li><a class="dropdown-item" href="<?php echo e(route('login')); ?>" wire:navigate>Iniciar sesión</a></li>
            <li><a class="dropdown-item" href="" wire:navigate>Registro</a></li>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </ul>
</div><?php /**PATH /home/claudio/webs/tidelib/resources/views/livewire/navbar-user.blade.php ENDPATH**/ ?>