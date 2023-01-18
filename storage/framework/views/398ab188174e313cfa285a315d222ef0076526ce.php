<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'title' => 'Social Media Engagement',
        'list' => [['bg' => 'primary', 'i' => 'mdi mdi-facebook', 'h5' => 'Facebook', 'p' => '125 sales'], ['bg' => 'info', 'i' => 'mdi mdi-twitter', 'h5' => 'Twitter', 'p' => '112 sales'], ['bg' => 'pink', 'i' => 'mdi mdi-instagram', 'h5' => 'Instagram', 'p' => '104 sales']],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'title' => 'Social Media Engagement',
        'list' => [['bg' => 'primary', 'i' => 'mdi mdi-facebook', 'h5' => 'Facebook', 'p' => '125 sales'], ['bg' => 'info', 'i' => 'mdi mdi-twitter', 'h5' => 'Twitter', 'p' => '112 sales'], ['bg' => 'pink', 'i' => 'mdi mdi-instagram', 'h5' => 'Instagram', 'p' => '104 sales']],
    ],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
$cols = 3;
$size = count($p->list);
$rows = $size / $cols;
$k = -1;
//
?>

<div class="card">
    <div class="card-body">
        <?php if(isset($p->menu)): ?>
            <div class="float-end">
                <div class="dropdown">
                    <a class=" dropdown-toggle" href="#" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted">
                            <?php echo e($p->menu[0]); ?>

                            <i class="mdi mdi-chevron-down ms-1"></i>
                        </span>
                    </a>
                    <?php if(count($p->menu) > 1): ?>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                            <?php $__currentLoopData = $p->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="dropdown-item" href="#!"><?php echo e($item); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <h4 class="card-title fw-normal"><?php echo e($p->title); ?></h4>

        <?php $__currentLoopData = $p->list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row mt-0">
                <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-4">
                        <div class="social-source text-center mt-3">
                            <div class="avatar-xs mx-auto mb-3">
                                <span
                                    class="avatar-title rounded-circle bg-<?php echo e($item['bg'] ?? $f::rand()); ?> font-size-16">
                                    <i class="<?php echo e($item['i']); ?> text-white mt-1"></i>
                                </span>
                            </div>
                            <h5 class="font-size-18"><?php echo e($item['p']); ?></h5>
                            <p class="text-muted mb-0"><?php echo e($f::wrap($item['h5'], 10)); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/card/totaled.blade.php ENDPATH**/ ?>