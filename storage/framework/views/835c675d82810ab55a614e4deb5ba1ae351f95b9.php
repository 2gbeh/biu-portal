<?php $attributes = $attributes->exceptProps([
    'p' => date('Y-m-d H:i:s'),
]); ?>
<?php foreach (array_filter(([
    'p' => date('Y-m-d H:i:s'),
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<td class="text-muted font-size-13">
    <?php echo date('D, M j, Y \a\t H:i A', strtotime($p)); ?>

</td>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/table/time.blade.php ENDPATH**/ ?>