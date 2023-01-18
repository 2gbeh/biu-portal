<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'value' => '34,152',
        'label' => 'Total Staff',
        'icon' => 'fi fi-rs-id-badge text-primary',
        'stats' => [
            [
                'arrow' => 'up',
                'color' => 'primary',
                'value' => '65%',
                'label' => 'Male',
            ],
            [
                'arrow' => 'down',
                'color' => 'danger',
                'value' => '35%',
                'label' => 'Female',
            ],
        ],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'value' => '34,152',
        'label' => 'Total Staff',
        'icon' => 'fi fi-rs-id-badge text-primary',
        'stats' => [
            [
                'arrow' => 'up',
                'color' => 'primary',
                'value' => '65%',
                'label' => 'Male',
            ],
            [
                'arrow' => 'down',
                'color' => 'danger',
                'value' => '35%',
                'label' => 'Female',
            ],
        ],
    ],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="card">
    <div class="card-body">
        <div class="float-end mt-2">
            <i class="<?php echo e($p->icon); ?> fs-2"></i>
        </div>
        <div>
            <h4 class="mb-1 mt-1">
                <span data-plugin="counterup"><?php echo e($f::cash($p->value)); ?></span>
            </h4>
            <p class="text-muted mb-0 fw-bol"><?php echo e($p->label); ?></p>
        </div>
        <p class="text-muted mt-3 mb-0">
            <?php $__currentLoopData = $p->stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="text-<?php echo e($stat['color']); ?> me-1">
                    <i class="mdi mdi-arrow-<?php echo e($stat['arrow']); ?>-bold me-1"></i>
                    <var style="margin-left:-5px;font-style:normal;">
                        <?php echo e($stat['value']); ?>

                    </var>
                </span> 
                <span style="margin-left:-3px;"><?php echo $stat['label']; ?></span> &nbsp;
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </p>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/card/summary-icon.blade.php ENDPATH**/ ?>