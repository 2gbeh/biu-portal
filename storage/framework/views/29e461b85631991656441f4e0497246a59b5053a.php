<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'thead' => ['#', 'Name', 'Position', 'Office', 'Age', 'Start Date', 'Salary', 'Action'],
        'pager' => [],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'thead' => ['#', 'Name', 'Position', 'Office', 'Age', 'Start Date', 'Salary', 'Action'],
        'pager' => [],
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
    <link href="<?php echo e(asset('assets/minible/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('assets/minible/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>"
        rel="stylesheet" type="text/css" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts_'); ?>
    <!-- Required datatable js -->
    <script src="<?php echo e(asset('assets/minible/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/minible/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <!-- Responsive examples -->
    <script src="<?php echo e(asset('assets/minible/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/minible/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(asset('assets/minible/js/pages/datatables.init.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                        <tr>
                            <?php $__currentLoopData = $p->thead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th><?php echo $th; ?></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        </tr>
                    </thead>

                    <tbody>
                        <?php echo e($slot); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/table/datatable.blade.php ENDPATH**/ ?>