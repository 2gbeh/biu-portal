<?php $attributes = $attributes->exceptProps([
    'p' => 9,
]); ?>
<?php foreach (array_filter(([
    'p' => 9,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<tr>
    <td colspan="<?php echo e($p); ?>">No records found</td>
</tr>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/table/empty.blade.php ENDPATH**/ ?>