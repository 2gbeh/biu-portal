

<?php $__env->startSection('page', 'Error 401 '); ?>
<?php $__env->startSection('app', 'Unauthorized Access'); ?>

<?php $__env->startSection('h1'); ?>
    <h1>Unauthorized Access</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('p'); ?>
    <p>
        It appears you're not authorized to access the requested resource <br />
        <a href="#!"><?php echo e(url()->current()); ?></a>
    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vudo\resources\views/errors/401.blade.php ENDPATH**/ ?>