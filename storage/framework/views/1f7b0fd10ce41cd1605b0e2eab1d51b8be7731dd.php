<?php $attributes = $attributes->exceptProps([
    'action' => 'dashboard',
    'input' => [
        'type' => 'file',
        'name' => 'photo',
        'accept' => 'image/*',
        'constraint' => 'required',
    ],
]); ?>
<?php foreach (array_filter(([
    'action' => 'dashboard',
    'input' => [
        'type' => 'file',
        'name' => 'photo',
        'accept' => 'image/*',
        'constraint' => 'required',
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
    <link href="<?php echo e(asset('assets/minible/libs/dropzone/min/dropzone.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts_'); ?>
    <script src="<?php echo e(asset('assets/minible/libs/dropzone/min/dropzone.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">
                    File upload
                </h4>
                <p class="card-title-desc">
                    Maximum file size allowed for upload: 500 MB
                </p>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.host','data' => ['action' => $action,'class' => 'dropzone']]); ?>
<?php $component->withName('form.host'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action),'class' => 'dropzone']); ?>
                    <div>
                        <div class="fallback">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.control','data' => ['p' => $input]]); ?>
<?php $component->withName('form.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['p' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($input)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>

                        <div class="dz-message needsclick">
                            <div class="mb-3">
                                <i class="display-4 text-muted fas fa-upload"></i>
                            </div>
                            <h4>Drag and drop files here to begin upload..</h4>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success waves-effect waves-light">
                            <i class="fas fa-save me-1"></i>
                            Upload
                        </button>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/form/upload.blade.php ENDPATH**/ ?>