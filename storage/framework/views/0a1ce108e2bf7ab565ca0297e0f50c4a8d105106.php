<?php $attributes = $attributes->exceptProps([
    'p' => ['clear', 'save', 'next'],
    // 'p' => ['clear', 'save'],
    // 'p' => ['next'],
]); ?>
<?php foreach (array_filter(([
    'p' => ['clear', 'save', 'next'],
    // 'p' => ['clear', 'save'],
    // 'p' => ['next'],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="row mt-0 pt-3" style="border-top:1px dotted #999;">
    <?php switch(count($p)):
        case (1): ?>
            <div class="col-md-12" style="text-align:right;">
                <?php if ($__env->exists("shared.button.{$p[0]}")) echo $__env->make("shared.button.{$p[0]}", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php break; ?>

        <?php case (3): ?>
            <div class="col-md-3">
                <?php if ($__env->exists("shared.button.{$p[0]}")) echo $__env->make("shared.button.{$p[0]}", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-9" style="text-align:right;">
                <?php if ($__env->exists("shared.button.{$p[1]}")) echo $__env->make("shared.button.{$p[1]}", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if ($__env->exists("shared.button.{$p[2]}")) echo $__env->make("shared.button.{$p[2]}", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php break; ?>

        <?php default: ?>
            <div class="col-md-12" style="text-align:right;">
                <?php if ($__env->exists("shared.button.{$p[0]}")) echo $__env->make("shared.button.{$p[0]}", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if ($__env->exists("shared.button.{$p[1]}")) echo $__env->make("shared.button.{$p[1]}", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
    <?php endswitch; ?>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/form/buttons.blade.php ENDPATH**/ ?>