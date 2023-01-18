<?php $__env->startSection('app', $portal); ?>

<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('assets/minible/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/minible/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/minible/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('body'); ?>

    <?php echo $__env->yieldContent('container'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vudo\resources\views/layouts/host/container.blade.php ENDPATH**/ ?>