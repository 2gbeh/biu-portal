<?php $attributes = $attributes->exceptProps([
    'p' => [
        'title' => 'Starter',
        'subtitle' => 'Starter plans',
        'icon' => 'fi fi-rs-cube',
        'list' => [
            'Users' => 1,
            'Storage' => '1 GB',
            'Domain' => '<b class="text-danger">No</b>',
            'Support' => '<b class="text-danger">No</b>',
            'Setup' => '<b class="text-danger">No</b>',
        ],
        'price' => '<sup>$</sup> 
                    <h1 style="display:inline-block;">19</h1> 
                    <small>/ Per month</small>',
        'link' => ['href' => '#!', 'text' => 'Sign up now'],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => [
        'title' => 'Starter',
        'subtitle' => 'Starter plans',
        'icon' => 'fi fi-rs-cube',
        'list' => [
            'Users' => 1,
            'Storage' => '1 GB',
            'Domain' => '<b class="text-danger">No</b>',
            'Support' => '<b class="text-danger">No</b>',
            'Setup' => '<b class="text-danger">No</b>',
        ],
        'price' => '<sup>$</sup> 
                    <h1 style="display:inline-block;">19</h1> 
                    <small>/ Per month</small>',
        'link' => ['href' => '#!', 'text' => 'Sign up now'],
    ],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="col-xl-<?php echo e($p['col'] ?? '4'); ?>">
    <div class="card pricing-box text-center">
        <div class="card-body p-4">
            <div>
                <div class="mt-3">
                    <h5 class="mb-1">
                        <?php echo $p['title']; ?>

                    </h5>

                    <p class="text-muted font-size-15 mt-2">
                        <?php echo $p['subtitle']; ?>

                    </p>
                </div>

                <?php if(isset($p['icon'])): ?>
                    <div class="pt-2">
                        <?php if(is_array($p['icon'])): ?>
                            <i class="<?php echo e($p['icon']['i']); ?> h3 text-<?php echo e($p['icon']['color']); ?>"></i>
                        <?php else: ?>
                            <i class="<?php echo e($p['icon']); ?> h3 text-danger"></i>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <ul class="list-unstyled plan-features mt-2">
                <?php $__currentLoopData = $p['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <span class="text-unmuted font-size-15"><?php echo $key; ?> </span>
                        <h5 class="text-primary mt-1 mb-0">
                            <?php echo $value; ?>

                        </h5>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <?php if(isset($p['price'])): ?>
                <div class="pb-3">
                    <?php echo $p['price']; ?>

                </div>
            <?php endif; ?>

            <div class="text-center plan-btn my-2">
                <a href="<?php echo e(url($p['link']['href'])); ?>" target="<?php echo e($p['link']['target'] ?? ''); ?>"
                    class="btn btn-<?php echo e($p['link']['color'] ?? 'success'); ?> waves-effect waves-light fw-bold font-size-12">
                    <?php echo $p['link']['text']; ?>

                </a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/pricelist/item.blade.php ENDPATH**/ ?>