

<?php $__env->startSection('page', 'Error 419'); ?>
<?php $__env->startSection('app', 'Page Expired'); ?>

<?php $__env->startSection('h1'); ?>
    <h1>Page Expired</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('p'); ?>
    <p>
        It appears the CSRF token for the requested resource <br/>
        <a href="#!"><?php echo e(url()->current()); ?></a>
        has exipred.
    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vudo\resources\views/errors/419.blade.php ENDPATH**/ ?>