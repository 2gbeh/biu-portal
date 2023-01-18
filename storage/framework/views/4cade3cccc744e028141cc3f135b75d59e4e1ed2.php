<?php $attributes = $attributes->exceptProps([
    'id' => 'form-host',
    'action' => 'dashboard',
    'method' => 'POST',
    'autocomplete' => 'off',
]); ?>
<?php foreach (array_filter(([
    'id' => 'form-host',
    'action' => 'dashboard',
    'method' => 'POST',
    'autocomplete' => 'off',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
$restful = !in_array(strtoupper($method), ['GET', 'POST']);

if ($restful) {
    $method_ = strtoupper($method);
    $method = 'POST';
}
?>

<form id="<?php echo e($id); ?>" action="<?php echo e(route($action)); ?>" method="<?php echo e($method); ?>" autocomplete="<?php echo e($autocomplete); ?>"
    <?php echo e($attributes->merge(['class'])); ?> enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php if($restful): ?>
        <?php echo method_field($method_); ?>
    <?php endif; ?>

    <?php echo e($slot); ?>

</form>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/form/host.blade.php ENDPATH**/ ?>