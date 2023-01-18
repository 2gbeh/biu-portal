<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon" />
    <title><?php echo $__env->yieldContent('page', 'Home'); ?> &bull; <?php echo $__env->yieldContent('app', env('APP_NAME')); ?></title>

    <!-- Fonts -->
    <?php echo $__env->yieldPushContent('fonts'); ?>

    <!-- Styles -->
    <link href="<?php echo e(asset('assets/font-awesome-5.15.4/css/all.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/uicons/uicons-regular-straight.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet" />
    <?php echo $__env->yieldPushContent('styles'); ?>

    <!-- Scripts -->
    <script src="<?php echo e(asset('assets/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/polaris.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(() => {
            autofill(0);
            togglePassword();
        });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</head>

<?php echo $__env->yieldContent('body'); ?>

</html>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/layouts/index.blade.php ENDPATH**/ ?>