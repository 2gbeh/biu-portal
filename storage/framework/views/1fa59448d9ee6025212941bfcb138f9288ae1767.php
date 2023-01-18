

<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('css/jrad-compact.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('body'); ?>
    

    <body class="error-404">
        <header>
            <figure>
                <a href="" title="Reload">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="" />
                </a>
                <figcaption>
                    <?php echo $__env->yieldContent('h1'); ?>

                    <?php echo $__env->yieldContent('p'); ?>

                    <a href="<?php echo e(url()->previous()); ?>" class="btn">
                        <i class="fas fa-arrow-left"></i>
                        Go back
                    </a>
                </figcaption>
            </figure>
        </header>

        <footer>
            <img src="<?php echo e(asset('images/gideon.gif')); ?>" alt="" title="Gideon" />
        </footer>
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vudo\resources\views/layouts/error.blade.php ENDPATH**/ ?>