<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'button' => ['href' => '', 'color' => 'primary', 'icon' => 'mdi mdi-sync', 'text' => 'Refresh'],
        'input' => ['action' => 'logs.store', 'name' => 'k', 'datalist' => ['John', 'Jane']],
        'thead' => ['#', 'Avatar', 'Name', 'Job Title', 'Email Address'],
    ],
    'x' => null,
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'button' => ['href' => '', 'color' => 'primary', 'icon' => 'mdi mdi-sync', 'text' => 'Refresh'],
        'input' => ['action' => 'logs.store', 'name' => 'k', 'datalist' => ['John', 'Jane']],
        'thead' => ['#', 'Avatar', 'Name', 'Job Title', 'Email Address'],
    ],
    'x' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="col-lg-12">

    <?php echo $__env->renderWhen(!isset($x['card-body']), 'shared.div', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.table.toolbar','data' => ['p' => $p]]); ?>
<?php $component->withName('table.toolbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['p' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($p)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <!-- end row -->
    <div class="table-responsive mb-4">
        <table class="table table-centered table-nowrap mb-0">
            <thead>
                <tr>
                    <?php $__currentLoopData = $p->thead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th scope="col"><?php echo $th; ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </thead>
            <tbody>
                <?php echo e($slot); ?>

            </tbody>
        </table>
    </div>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.table.pager','data' => ['p' => $p]]); ?>
<?php $component->withName('table.pager'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['p' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($p)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <?php echo $__env->renderWhen(!isset($x['card-body']), 'shared.div', ['div' => 2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/table/index.blade.php ENDPATH**/ ?>