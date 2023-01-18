<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'id' => 'faqs',
        'expanded' => true,
        'columned' => true,
        'title' => 'General Questions',
        'subtitle' => 'General Questions',
        'list' => [
            [
                'question' => 'What is Lorem Ipsum ?',
                'answer' => 'If several languages coalesce, the grammar of the resulting language is more simple.',
            ],
            [
                'question' => 'Where does it come from ?',
                'answer' => 'Everyone realizes why a new common language would be desirable one could refuse to pay expensive translators.',
            ],
            [
                'question' => 'Why do we use it ?',
                'answer' => 'Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.',
            ],
        ],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'id' => 'faqs',
        'expanded' => true,
        'columned' => true,
        'title' => 'General Questions',
        'subtitle' => 'General Questions',
        'list' => [
            [
                'question' => 'What is Lorem Ipsum ?',
                'answer' => 'If several languages coalesce, the grammar of the resulting language is more simple.',
            ],
            [
                'question' => 'Where does it come from ?',
                'answer' => 'Everyone realizes why a new common language would be desirable one could refuse to pay expensive translators.',
            ],
            [
                'question' => 'Why do we use it ?',
                'answer' => 'Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.',
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
$p->id = 'x-accordion_' . $p->id;
$p->collapse = $p->expanded === true ? 'show' : '';

if ($p->columned) {
    $n = count($p->list);

    if ($n % 2 == 0) {
        $div = $n / 2;
    } else {
        $div = ($n + 1) / 2;
    }

    $p->list_l = array_slice($p->list, 0, $div);
    $p->list_r = array_slice($p->list, $div);

    // dd($p->list_l, $p->list_r);
}
?>

<div id="faqs-accordion" class="custom-accordion mt-5 mt-xl-0">
    <div class="card border shadow-none">
        <a href="#<?php echo e($p->id); ?>" class="text-dark" data-bs-toggle="collapse" aria-haspopup="true"
            aria-expanded="<?php echo e($p->expanded); ?>" aria-controls="<?php echo e($p->id); ?>">
            <div class="bg-light p-3">

                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar-xs">
                            <div class="avatar-title rounded-circle bg-soft-primary font-size-22">
                                <i class="fas fa-question-circle text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="font-size-16 mb-1"><?php echo $p->title; ?></h5>
                        <p class="text-muted text-truncate mb-0"><?php echo $p->subtitle ?? 'Frequently Asked Questions'; ?></p>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="mdi mdi-chevron-up accor-down-icon font-size-16"></i>
                    </div>
                </div>
            </div>
        </a>

        <div id="<?php echo e($p->id); ?>" class="collapse <?php echo e($p->collapse); ?>" data-bs-parent="#faqs-accordion">
            <div class="p-4">
                <div class="row">
                    <?php if($p->columned): ?>
                        <div class="col-md-6">
                            <?php $__currentLoopData = $p->list_l; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.accordion.item','data' => ['p' => ['question' => $item['question'], 'answer' => $item['answer']]]]); ?>
<?php $component->withName('accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['p' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['question' => $item['question'], 'answer' => $item['answer']])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="col-md-6">
                            <?php $__currentLoopData = $p->list_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.accordion.item','data' => ['p' => ['question' => $item['question'], 'answer' => $item['answer']]]]); ?>
<?php $component->withName('accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['p' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['question' => $item['question'], 'answer' => $item['answer']])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="col-md-12">
                            <?php $__currentLoopData = $p->list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.accordion.item','data' => ['p' => ['question' => $item['question'], 'answer' => $item['answer']]]]); ?>
<?php $component->withName('accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['p' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['question' => $item['question'], 'answer' => $item['answer']])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/accordion/index.blade.php ENDPATH**/ ?>