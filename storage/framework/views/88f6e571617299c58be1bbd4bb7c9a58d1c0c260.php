<?php $__env->startSection('page', $data->breadcrumb['breadcrumb_page']); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-5">
                            <div class="text-center">
                                <h5><?php echo $data->title_card_props['title']; ?></h5>
                                <p class="text-muted">
                                    <?php echo $data->title_card_props['summary']; ?>

                                </p>
                                <div>
                                    <?php $__currentLoopData = $data->title_card_props['action']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="btn btn-<?php echo e($item['a']['color'] ?? 'primary'); ?> mt-2 me-2 waves-effect waves-light"
                                            href="<?php echo e($item['a']['href']); ?>" target="_new">
                                            <i class="<?php echo e($item['i']); ?> mx-1"></i>
                                            <?php echo e($item['text']); ?>

                                        </a> &nbsp;
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-xl-3 col-sm-5 mx-auto">
                            <div>
                                <img src="<?php echo e(asset('assets/minible/images/faqs-img.png')); ?>" alt=""
                                    class="img-fluid mx-auto d-block">
                            </div>
                        </div>

                        <div class="col-xl-8">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.accordion.index','data' => ['p' => $data->contact_us_props]]); ?>
<?php $component->withName('accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['p' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->contact_us_props)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.accordion.index','data' => ['p' => $data->about_us_props]]); ?>
<?php $component->withName('accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['p' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->about_us_props)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.host.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vudo\resources\views/help.blade.php ENDPATH**/ ?>