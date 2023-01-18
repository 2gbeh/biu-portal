<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'thead' => ['#', 'Avatar', 'Name', 'Job Title', 'Email Address'],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'thead' => ['#', 'Avatar', 'Name', 'Job Title', 'Email Address'],
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
    <link href="<?php echo e(asset('assets/minible/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php echo e(asset('assets/minible/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>"
        rel="stylesheet" type="text/css" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts_'); ?>
    <!-- Required datatable js -->
    <script src="<?php echo e(asset('assets/minible/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/minible/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>

    <!-- init js -->
    <script src="<?php echo e(asset('assets/minible/js/pages/ecommerce-datatables.init.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<div class="col-lg-12">
    <div class="table-responsive mb-4">
        <table class="table table-centered datatable dt-responsive nowrap table-card-list"
            style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
            <thead>
                <tr>
                    
                    <?php $__currentLoopData = $p->thead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th><?php echo $th; ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </thead>
            <tbody>
                <?php echo e($slot); ?>

                
            </tbody>
        </table>
    </div>

    
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/table/spaced.blade.php ENDPATH**/ ?>