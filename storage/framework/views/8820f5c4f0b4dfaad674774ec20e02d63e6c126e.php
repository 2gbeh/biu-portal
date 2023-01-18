<?php $attributes = $attributes->exceptProps([
    'p' => [
        [
            'id' => 'about',
            'icon' => 'uil uil-user-circle',
            'text' => 'About',
        ],
        [
            'id' => 'tasks',
            'icon' => 'uil uil-clipboard-notes',
            'text' => 'Tasks',
        ],
        [
            'id' => 'messages',
            'icon' => 'uil uil-envelope-alt',
            'text' => 'Messages',
        ],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => [
        [
            'id' => 'about',
            'icon' => 'uil uil-user-circle',
            'text' => 'About',
        ],
        [
            'id' => 'tasks',
            'icon' => 'uil uil-clipboard-notes',
            'text' => 'Tasks',
        ],
        [
            'id' => 'messages',
            'icon' => 'uil uil-envelope-alt',
            'text' => 'Messages',
        ],
    ],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="card mb-0">
    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
        <?php $__currentLoopData = $p; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($loop->index < 1): ?>
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#<?php echo e($item['id']); ?>" role="tab">
                        <i class="<?php echo e($item['icon']); ?> font-size-16 my-2"></i>
                        <span class="d-none d-sm-block"><?php echo e($item['text']); ?></span>
                    </a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#<?php echo e($item['id']); ?>" role="tab">
                        <i class="<?php echo e($item['icon']); ?> font-size-16 my-2"></i>
                        <span class="d-none d-sm-block"><?php echo e($item['text']); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <div class="tab-content p-4">
        
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/tabs.blade.php ENDPATH**/ ?>