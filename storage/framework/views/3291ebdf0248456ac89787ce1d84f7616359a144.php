<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'chart' => 3,
        'currency' => '$',
        'value' => 34152.0,
        'label' => 'Total Revenue',
        'stats' => [
            [
                'color' => 'success',
                'arrow' => 'up',
                'value' => '2.65%',
                'label' => 'since last week',
            ],
        ],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'chart' => 3,
        'currency' => '$',
        'value' => 34152.0,
        'label' => 'Total Revenue',
        'stats' => [
            [
                'color' => 'success',
                'arrow' => 'up',
                'value' => '2.65%',
                'label' => 'since last week',
            ],
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

<?php
$card_summary_charts = [null, 'total-revenue-chart', 'orders-chart', 'customers-chart', 'growth-chart'];
?>

<?php $__env->startPush('scripts_'); ?>
    <script src="<?php echo e(asset('assets/minible/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/minible/js/pages/dashboard.init.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<div class="card">
    <div class="card-body">
        <div class="float-end mt-2">
            <div id="<?php echo e($card_summary_charts[$p->chart ?? 3]); ?>"></div>
        </div>
        <div>
            <h4 class="mb-1 mt-1">
                <?php echo $p->currency; ?>

                <span data-plugin="counterup"><?php echo e($f::cash_($p->value)); ?></span>
            </h4>
            <p class="text-muted mb-0 fw-bol"><?php echo e($p->label); ?></p>
        </div>
        <p class="text-muted mt-3 mb-0">
            <?php $__currentLoopData = $p->stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="text-<?php echo e($stat['color']); ?> me-1">
                    <i class="mdi mdi-arrow-<?php echo e($stat['arrow']); ?>-bold me-1"></i>
                    <var style="margin-left:-5px;font-style:normal;">
                        <?php echo e($stat['value']); ?>

                    </var>
                </span>
                <span style="margin-left:-3px;"><?php echo e($stat['label']); ?></span> &nbsp;
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </p>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/card/summary-chart.blade.php ENDPATH**/ ?>