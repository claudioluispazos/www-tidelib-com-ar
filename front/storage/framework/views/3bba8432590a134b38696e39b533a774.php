<?php $__env->startComponent('mail::message'); ?>
# Hola <?php echo e($name); ?>,

<?php if(isset($isReset) && $isReset): ?>
Recibimos una solicitud para restablecer la contraseña de tu cuenta.

Usa el siguiente código para restablecer tu contraseña:
<?php else: ?>
Gracias por registrarte en Tidelib. Estamos emocionados de tenerte con nosotros.

Para activar tu cuenta, ingresa el siguiente código de verificación:
<?php endif; ?>

<?php $__env->startComponent('mail::panel'); ?>
<div style="font-size: 24px; letter-spacing: 5px; text-align: center; font-weight: bold;"><?php echo e($code); ?></div>
<?php echo $__env->renderComponent(); ?>

Este código expirará en <?php echo e($expiresIn); ?>.

<?php if(isset($isReset) && $isReset): ?>
Si no solicitaste restablecer tu contraseña, puedes ignorar este mensaje.
<?php else: ?>
Si no has creado una cuenta, puedes ignorar este mensaje.
<?php endif; ?>

Saludos,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/claudio/webs/tidelib/resources/views/emails/verification-code.blade.php ENDPATH**/ ?>