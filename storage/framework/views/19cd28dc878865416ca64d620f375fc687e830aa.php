<?php $hostContent = app('App\Services\HostContentService'); ?>



<?php $__env->startSection('container'); ?>

    <body class="host-layout" data-sidebar="light" data-topbar="dark">
        <?php echo $__env->renderWhen(count($errors) > 0, 'shared.alert', ['alert_host' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

        <div id="layout-wrapper">
            <?php if ($__env->exists('shared.header.index', $hostContent->headerProps())) echo $__env->make('shared.header.index', $hostContent->headerProps(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if ($__env->exists('shared.nav.index', $hostContent->navProps())) echo $__env->make('shared.nav.index', $hostContent->navProps(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <?php if ($__env->exists('shared.breadcrumb', $data->breadcrumb)) echo $__env->make('shared.breadcrumb', $data->breadcrumb, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>

                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
                <?php if ($__env->exists('shared.footer', $hostContent->footerProps())) echo $__env->make('shared.footer', $hostContent->footerProps(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if ($__env->exists('shared.chatbot', $hostContent->chatbotProps())) echo $__env->make('shared.chatbot', $hostContent->chatbotProps(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
        

        <!-- Scripts -->
        
        <script src="<?php echo e(asset('assets/minible/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/minible/libs/metismenu/metisMenu.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/minible/libs/simplebar/simplebar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/minible/libs/node-waves/waves.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/minible/libs/waypoints/lib/jquery.waypoints.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/minible/libs/jquery.counterup/jquery.counterup.min.js')); ?>"></script>

        <?php echo $__env->yieldPushContent('scripts_'); ?>

        <script src="<?php echo e(asset('assets/minible/js/app.js')); ?>"></script>
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.host.container', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vudo\resources\views/layouts/host/content.blade.php ENDPATH**/ ?>