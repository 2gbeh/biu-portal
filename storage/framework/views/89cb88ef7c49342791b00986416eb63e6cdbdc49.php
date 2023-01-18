<?php $attributes = $attributes->exceptProps([
    'p' => 1,
]); ?>
<?php foreach (array_filter(([
    'p' => 1,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<td>
    <ul class="list-inline mb-0">
        <li class="list-inline-item" title="Open">
            <a href="<?php echo e(url($url::show($p))); ?>" class="px-2 text-primary">
                <i class="far fa-folder-open font-size-15"></i>
            </a>
        </li>
    </ul>
</td>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/table/open.blade.php ENDPATH**/ ?>