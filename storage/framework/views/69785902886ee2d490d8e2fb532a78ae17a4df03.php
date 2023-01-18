<?php $attributes = $attributes->exceptProps([
    'p' => ['color' => 'success', 'text' => 'Done'],
]); ?>
<?php foreach (array_filter(([
    'p' => ['color' => 'success', 'text' => 'Done'],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>


<span class="badge bg-soft-<?php echo e($p['color'] ?? 'primary'); ?> font-size-12" role="button">
    <?php echo e($p['text']); ?>

</span>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/badge/index.blade.php ENDPATH**/ ?>