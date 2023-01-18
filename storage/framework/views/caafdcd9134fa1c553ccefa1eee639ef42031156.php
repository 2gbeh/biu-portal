<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'iteration' => 1,
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'iteration' => 1,
    ],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<td style="width:10px;">
    <?php echo e($p->iteration); ?>

</td>


<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/table/iter.blade.php ENDPATH**/ ?>