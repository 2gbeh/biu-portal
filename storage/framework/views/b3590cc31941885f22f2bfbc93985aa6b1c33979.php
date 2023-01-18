<?php
$header_menu_tooltip = $header_menu_tooltip ?? 'Account';
$header_menu_avatar = $header_menu_avatar ?? 'images/avatar.png';

$header_menu_profile_url = $header_menu_profile_url ?? 'admin/profile';
$header_menu_logout_url = $header_menu_logout_url ?? 'admin/logout';
$header_menu_name = $header_menu_name ?? 'Mark';
$header_menu_list = $header_menu_list ?? [
    [
        'a' => ['href' => '#'],
        'i' => 'fas fa-bug',
        'text' => 'Tech Support',
    ],
    [
        'a' => ['href' => '#', 'target' => '_new'],
        'i' => 'fas fa-globe',
        'text' => 'Visit Website',
    ],
];

?>


<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effec" id="page-header-user-dropdown" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" title="<?php echo e($header_menu_tooltip); ?>">

        <img class="rounded-circle header-profile-user" src="<?php echo e(asset($header_menu_avatar)); ?>" alt=""
            style="margin-right:5px; width:40px; height:40px; border:2px solid #fff;" />

        <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15 override-fg"
            style="position:relative;top:1px;">
            <?php echo e($header_menu_name); ?>

        </span>
        &nbsp;
        <i class="fas fa-caret-down d-none d-xl-inline-block font-size-15 override-fg"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        <a class="dropdown-item" href="<?php echo e(url($header_menu_profile_url)); ?>">
            <i class="fas fa-user-circle font-size-18 align-middle text-muted me-1"></i>
            <span class="align-middle">My Profile</span>
        </a>

        <?php $__currentLoopData = $header_menu_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="dropdown-item" href="<?php echo e(url($item['a']['href'])); ?>" target="<?php echo e($item['a']['target'] ?? ''); ?>">
                <?php if(isset($item['i'])): ?>
                    <i class="<?php echo e($item['i']); ?> font-size-18 align-middle text-muted me-1"></i>
                <?php endif; ?>
                <span class="align-middle">
                    <?php echo e($item['text']); ?>

                </span>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <a class="dropdown-item" href="#!">
            <i class="fas fa-sign-out-alt font-size-18 align-middle me-1 text-muted"></i>
            <span class="align-middle">
                <?php if ($__env->exists('shared.button.sign-out', ['button_sign_out_action' => $header_menu_logout_url])) echo $__env->make('shared.button.sign-out', ['button_sign_out_action' => $header_menu_logout_url], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </span>
        </a>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/header/menu.blade.php ENDPATH**/ ?>