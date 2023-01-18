<?php
$header_notifications_tooltip = $header_notifications_tooltip ?? 'Notifications';
$header_notifications_title = $header_notifications_title ?? 'Notifications';
$header_notifications_url = $header_notifications_url ?? '#';
$header_notifications_list = $header_notifications_list ?? [
    [
        'subject' => 'Minible - Admin & Dashboard Template',
        'message' => '<b>Minible</b> is an admin dashboard template that is a beautifully crafted, clean & minimal designed admin template with Dark, Light Layouts with RTL options.',
        'created_at' => $f::carbon('minute'),
        'id' => 1,
    ],
];

$size = count($header_notifications_list);

?>


<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item noti-icon waves-effec" id="page-header.notifications-dropdown"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e($header_notifications_tooltip); ?>">
        <i class="fi fi-rs-bell ico override-fg" style="font-size:18px;"></i>
        <span class="badge bg-danger rounded-pill"><?php echo e($size); ?></span>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
        aria-labelledby="page-header.notifications-dropdown">

        <div class="p-3">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="m-0 font-size-16"><?php echo e($header_notifications_title); ?></h5>
                </div>
                <div class="col-auto">
                    <a href="<?php echo e(url($header_notifications_url)); ?>" class="small">View all</a>
                </div>
            </div>
        </div>
        <div data-simplebar style="max-height: 230px;">
            <?php $__currentLoopData = $header_notifications_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(url($header_notifications_url . '/' . $item['id'])); ?>" class="text-reset notification-item">
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0 me-0">
                            <div class="avatar-xs">
                                <i class="fas fa-info-circle text-info"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1"><?php echo $f::wrap($item['subject'], 64); ?></h6>
                            <div class="font-size-12 text-muted">
                                <p class="mb-1"><?php echo $f::wrap($item['message']); ?></p>
                                <p class="mb-0 text-warning">
                                    <?php echo e($f::ago($item['created_at'])); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/header/notifications.blade.php ENDPATH**/ ?>