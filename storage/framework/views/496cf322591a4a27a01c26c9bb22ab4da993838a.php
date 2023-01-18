<?php $attributes = $attributes->exceptProps([
    'p' => [
        'col' => 4,
        'type' => 'search',
        'label' => 'Username',
        'name' => 'username',
        'placeholder' => 'Enter username',
        'datalist' => $_SERVER,
        'constraint' => 'required', // autofocus|required|readonly|disabled|multiple
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => [
        'col' => 4,
        'type' => 'search',
        'label' => 'Username',
        'name' => 'username',
        'placeholder' => 'Enter username',
        'datalist' => $_SERVER,
        'constraint' => 'required', // autofocus|required|readonly|disabled|multiple
    ],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('assets/minible/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts_'); ?>
    <script src="<?php echo e(asset('assets/minible/libs/select2/js/select2.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.control','data' => ['p' => $p]]); ?>
<?php $component->withName('form.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['p' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($p)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/form/item.blade.php ENDPATH**/ ?>