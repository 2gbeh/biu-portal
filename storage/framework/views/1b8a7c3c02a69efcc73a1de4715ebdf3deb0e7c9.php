<?php $attributes = $attributes->exceptProps([
    'p' => ['danger' => 1 + 1 == 2],
    // 'p' => [$pi => 3.142],
]); ?>
<?php foreach (array_filter(([
    'p' => ['danger' => 1 + 1 == 2],
    // 'p' => [$pi => 3.142],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
$p['text'] = array_keys($p)[0];
$p['eval'] = array_values($p)[0];
$p['is_bool'] = is_bool($p['eval']) && $p['eval'] == true;
$p['is_string'] = is_string($p['eval']) && $p['eval'] == $p['text'];
?>

<?php if($p['is_bool'] || $p['is_string']): ?>
    <span class="badge bg-soft-danger font-size-12">
        <?php echo e($p['text']); ?>

    </span>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/badge/danger.blade.php ENDPATH**/ ?>