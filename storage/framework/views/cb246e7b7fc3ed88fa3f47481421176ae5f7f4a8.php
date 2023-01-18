<?php $attributes = $attributes->exceptProps([
    'p' => (object) ['color' => 'light', 'data' => 'Web Checkout'],
]); ?>
<?php foreach (array_filter(([
    'p' => (object) ['color' => 'light', 'data' => 'Web Checkout'],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
$p = is_array($p) ? (object) $p : $p;
?>

<td>
    <button class="btn btn-<?php echo e($p->color); ?> btn-sm w-xs font-size-12">
        <?php echo e($p->text); ?>

    </button>
</td>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/table/button.blade.php ENDPATH**/ ?>