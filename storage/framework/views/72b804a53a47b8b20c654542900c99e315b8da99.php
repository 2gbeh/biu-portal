<?php
$breadcrumb_page = $breadcrumb_page ?? 'Dashboard';
$breadcrumb_base = $breadcrumb_base ?? 'Home';
?>

<div class="page-title-box d-flex align-items-center justify-content-between px-2">
    <h4 class="mb-0 fw-normal"><?php echo e($breadcrumb_page); ?></h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item" title="Top">
                <?php echo e($breadcrumb_base); ?>

            </li>
            <li class="breadcrumb-item active">
                <?php echo e($breadcrumb_page); ?> &nbsp;
                <a href="" title="Reload">
                    <i class="fas fa-sync-alt text-success"></i>
                </a>
            </li>
        </ol>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/breadcrumb.blade.php ENDPATH**/ ?>