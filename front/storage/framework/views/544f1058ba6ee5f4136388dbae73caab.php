<?php $__env->startSection('header_content'); ?>
  <div class="d-none d-lg-block"><?php echo $__env->make('components.navbar-desktop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
  <div class="d-none d-md-block d-lg-none"><?php echo $__env->make('components.navbar-tablet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
  <div class="d-block d-md-none"><?php echo $__env->make('components.navbar-mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.tidelibmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/claudio/webs/tidelib/resources/views/layouts/tidelib.blade.php ENDPATH**/ ?>