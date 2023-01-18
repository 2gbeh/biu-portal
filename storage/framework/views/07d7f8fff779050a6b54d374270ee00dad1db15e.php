<?php
$nav_item = $nav_item ?? [
    'a' => ['href' => 'admin/dashboard', 'target' => ''],
    'b' => [],
    'i' => 'fi fi-rs-dashboard',
    'dt' => 'Dashboard',
    'dd' => [],
];
?>

<li>
    <a href="<?php echo e(url($nav_item['a']['href'])); ?>" target="<?php echo e($nav_item['a']['target']); ?>">
        <?php if(count($nav_item['b']) > 0): ?>
            <span style="margin-top:2px;"
                class="badge rounded-pill fw-bold bg-<?php echo e($nav_item['b']['color'] ?? 'danger'); ?> float-end">
                <?php echo e($nav_item['b']['text'] ?? 'new'); ?>

            </span>
        <?php endif; ?>
        <i class="<?php echo e($nav_item['i']); ?>"></i>
        <span style="white-space:nowrap;"><?php echo $nav_item['dt']; ?></span>
    </a>
</li>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/nav/item.blade.php ENDPATH**/ ?>