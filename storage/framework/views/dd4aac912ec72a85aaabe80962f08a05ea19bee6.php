<?php $__env->startSection('app', $portal); ?>

<?php $__env->startPush('fonts'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('assets/windmill/css/tailwind.output.css')); ?>" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/windmill/js/alpine.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('assets/windmill/js/init-alpine.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('body'); ?>

    <?php echo $__env->yieldContent('container'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vudo\resources\views/layouts/guest/container.blade.php ENDPATH**/ ?>