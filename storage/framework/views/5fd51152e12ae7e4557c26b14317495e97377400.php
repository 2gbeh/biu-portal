

<?php $__env->startSection('page', 'Error 404'); ?>
<?php $__env->startSection('app', 'Page Not Found'); ?>

<?php $__env->startSection('h1'); ?>
    <h1>Page Not Found</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('p'); ?>
    <p>
        It appears the requested resource
        <a href="#!"><?php echo e(url()->current()); ?></a> <br />
        does not exist or has been moved permanently.
    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vudo\resources\views/errors/404.blade.php ENDPATH**/ ?>