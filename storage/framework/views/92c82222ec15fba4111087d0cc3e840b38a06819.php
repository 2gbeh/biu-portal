<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'pager' => ['insight' => [], 'links' => []],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'pager' => ['insight' => [], 'links' => []],
    ],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="row mt-4">
    <div class="col-sm-6">
        <div>
            <p class="mb-sm-0">
                <?php echo e($p->pager->insight); ?>

            </p>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="float-sm-end">
            <?php echo e($p->pager->links); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/table/pager.blade.php ENDPATH**/ ?>