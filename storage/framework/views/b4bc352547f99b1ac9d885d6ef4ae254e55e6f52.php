<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'title' => 'Recent Activity',
        'menu' => ['Recent', 'By Users'],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'title' => 'Recent Activity',
        'menu' => ['Recent', 'By Users'],
    ],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="card" style="min-height:30em;max-height:30em;">
    <div class="card-body">
        <?php if(isset($p->menu)): ?>
            <div class="float-end">
                <div class="dropdown">
                    <a class=" dropdown-toggle" href="#" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted">
                            <?php echo e($p->menu[0]); ?>

                            <i class="mdi mdi-chevron-down ms-1"></i>
                        </span>
                    </a>
                    <?php if(count($p->menu) > 1): ?>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                            <?php $__currentLoopData = $p->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="dropdown-item" href="#!"><?php echo e($item); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        
        <h4 class="card-title mb-4 fw-normal"><?php echo e($p->title); ?></h4>

        <ol class="activity-feed mb-0 ps-2" data-simplebar style="max-height: 339px;">
            <?php echo e($slot); ?>

        </ol>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/card/timeline.blade.php ENDPATH**/ ?>