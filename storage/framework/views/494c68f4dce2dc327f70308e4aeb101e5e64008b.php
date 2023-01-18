<?php $guestContent = app('App\Services\GuestContentService'); ?>



<?php $__env->startSection('container'); ?>

    <body class="guest-layout">
        <?php echo $__env->renderWhen(count($errors) > 0, 'shared.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

        <div class="flex items-center min-h-screen p-6 nobg-gray-50 nodark:bg-gray-900 parent-container">
            <div
                class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg noshadow-xl nodark:bg-gray-800 parent-wrapper">
                <div class="flex flex-col overflow-y-auto md:flex-row">

                    <div class="h-32 md:h-auto md:w-1/2 card-image">                        
                        <img aria-hidden="true" class="object-cover w-full h-full nodark:hidden"
                            src="<?php echo e(asset($guestContent->authImageProps())); ?>" alt="" />
                    </div>

                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">

                            <figure class="form-legend">
                                <a href="/" title="Home">
                                    <img class="logo" src="<?php echo e(asset('images/logo.png')); ?>" alt="" />
                                </a>
                                <figcaption class="mb-4 text-xl font-semibold text-gray-700">
                                    <?php echo e($portal); ?>

                                </figcaption>
                            </figure>

                            <?php echo $__env->yieldContent('content'); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Scripts -->
        <?php echo $__env->yieldPushContent('scripts_'); ?>
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest.container', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vudo\resources\views/layouts/guest/content.blade.php ENDPATH**/ ?>