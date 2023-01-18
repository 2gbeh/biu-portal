<?php
$nav_group = $nav_group ?? [
    'a' => [],
    'b' => [],
    'i' => 'fi fi-rs-address-book',
    'dt' => 'Accounts',
    'dd' => [
        [
            'a' => ['href' => '/admin/create', 'target' => ''],
            'b' => [],
            'i' => 'fi fi-rs-user-add',
            'dt' => 'Add New',
            'dd' => [],
        ],
        [
            'a' => ['href' => '/admin', 'target' => ''],
            'b' => ['color' => 'danger', 'text' => 15],
            'i' => 'fi fi-rs-list-check',
            'dt' => 'Manage',
            'dd' => [],
        ],
    ],
];
?>

<li>
    <a href="javascript:void(0);" class="has-arrow waves-effec">
        <i class="<?php echo e($nav_group['i']); ?>"></i>
        <span style="white-space:nowrap;"><?php echo $nav_group['dt']; ?></span>
    </a>
    <ul class="sub-menu" aria-expanded="false" style="margin-left:-20px;">
        <?php $__currentLoopData = $nav_group['dd']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li style="white-space:nowrap;">
                <a href="<?php echo e(url($nav_item['a']['href'])); ?>" target="<?php echo e($nav_item['a']['target']); ?>">
                    <?php if(count($nav_item['b']) > 0): ?>
                        <span style="margin-top:2px;"
                            class="badge rounded-pill fw-bold bg-<?php echo e($nav_item['b']['color'] ?? 'danger'); ?> float-end">
                            <?php echo e($nav_item['b']['text'] ?? 'new'); ?>

                        </span>
                    <?php endif; ?>
                    <?php if(isset($nav_item['i'])): ?>
                        <i class="<?php echo e($nav_item['i']); ?>"></i>
                    <?php endif; ?>
                    <span style="white-space:nowrap;"><?php echo $nav_item['dt']; ?></span>
                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</li>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/nav/group.blade.php ENDPATH**/ ?>