<?php
$header_bg = $header_bg ?? '#0093dd';
$header_fg = $header_fg ?? '#fff';
?>

<style type="text/css">
    #page-topbar .override-bg {
        background-color: <?php echo e($header_bg); ?>;
    }

    #page-topbar .override-fg {
        color: <?php echo e($header_fg . '!important'); ?>;
    }

    #page-topbar .ico {
        position: relative;
        top: 3px;
        font-size: 18px;
    }
</style>

<header id="page-topbar">
    <div class="navbar-header override-bg">
        <div class="d-flex">
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fas fa-fw fa-bars override-fg"></i>
            </button>
        </div>

        <div class="d-flex">
            <?php if ($__env->exists('shared.header.languages')) echo $__env->make('shared.header.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if ($__env->exists('shared.header.apps', $hostContent->headerAppsProps())) echo $__env->make('shared.header.apps', $hostContent->headerAppsProps(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if ($__env->exists('shared.header.notifications', $hostContent->headerNotificationsProps())) echo $__env->make('shared.header.notifications', $hostContent->headerNotificationsProps(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if ($__env->exists('shared.header.menu', $hostContent->headerMenuProps())) echo $__env->make('shared.header.menu', $hostContent->headerMenuProps(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="dropdown d-inline-block d-none">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="uil-cog"></i>
                </button>
            </div>
        </div>
    </div>
</header>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/header/index.blade.php ENDPATH**/ ?>