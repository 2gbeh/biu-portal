<?php $attributes = $attributes->exceptProps([
    'id' => 'form-guest',
    'action' => 'admin/login',
    'method' => 'POST',
    'autocomplete' => 'off',
]); ?>
<?php foreach (array_filter(([
    'id' => 'form-guest',
    'action' => 'admin/login',
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

<script type="text/javascript">
    const handleFormGuest = (event, this_) => {
        event.preventDefault();
        $(this_.tagName)
            .find("button")
            .prop("disabled", true)
            .end()
            .find("button img")
            .css("visibility", "visible")
            .end()
            .find("button span")
            .text("processing...")
            .end();
        this_.submit();
    };
</script>

<form id="<?php echo e($id); ?>" action="<?php echo e(url($action)); ?>" method="<?php echo e($method); ?>" autocomplete="<?php echo e($autocomplete); ?>"
    onsubmit="handleFormGuest(event, this)">
    <?php echo csrf_field(); ?>
    <?php if($restful): ?>
        <?php echo method_field($method_); ?>
    <?php endif; ?>

    <?php echo e($slot); ?>

</form>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/form/guest.blade.php ENDPATH**/ ?>