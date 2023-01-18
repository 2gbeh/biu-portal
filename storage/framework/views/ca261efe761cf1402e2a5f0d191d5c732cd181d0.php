<?php foreach (([
    'p' => (object) [
        'title' => 'Choose your pricing plan',
        'summary' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo veritatis',
    ],
]) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<?php if ($__env->exists('shared.jumbotron', [
    'jumbotron_title' => $p->title,
    'jumbotron_summary' => $p->summary,
])) echo $__env->make('shared.jumbotron', [
    'jumbotron_title' => $p->title,
    'jumbotron_summary' => $p->summary,
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row justify-content-center mt-3 mb-5">
    <div class="col-lg-12">
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/pricelist/index.blade.php ENDPATH**/ ?>