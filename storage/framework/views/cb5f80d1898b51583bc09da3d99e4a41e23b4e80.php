<?php foreach (([
    'p' => (object) [
        'button' => ['href' => '', 'color' => 'primary', 'icon' => 'mdi mdi-sync', 'text' => 'Refresh', 'event' => null],
        'input' => ['action' => 'logs.store', 'name' => 'k', 'datalist' => ['John', 'Jane']],
    ],
]) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<div class="row mb-2">
    <div class="col-md-6">
        <div class="mb-3">
            <?php if(isset($p->button)): ?>
                <a href="<?php echo e(url($p->button['href']) ?? 'javascript:void(0);'); ?>" onclick="<?php echo e($p->button['event'] ?? 'javacript:void(0);'); ?>"
                    class="btn btn-<?php echo e($p->button['color'] ?? 'primary'); ?> waves-effect waves-light">
                    <i class="<?php echo e($p->button['icon'] ?? 'mdi mdi-plus'); ?> me-2 font-size-12"></i>
                    <span style="margin-left:-5px;"><?php echo e($p->button['text'] ?? 'Add New'); ?></span>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-inline float-md-end mb-3">
            <div class="search-box ms-2">
                <div class="position-relative">
                    <?php if(isset($p->input)): ?>
                        <form method="GET" action="" autocomplete="off">
                            
                            <?php echo csrf_field(); ?>
                            <input type="search" class="form-control rounded bg-light border-0"
                                name="<?php echo e($p->input['name']); ?>" value="<?php echo e(old($p->input['name'])); ?>"
                                placeholder="Search ( / )" list="dl-<?php echo e($p->input['name']); ?>"
                                <?php echo e($p->input['disabled'] ?? 'required'); ?> />

                            <i class="mdi mdi-magnify search-icon"></i>

                            <?php if(isset($p->input['datalist'])): ?>
                                <datalist id="dl-<?php echo e($p->input['name']); ?>">
                                    <?php $__currentLoopData = $p->input['datalist']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($option); ?>">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </datalist>
                            <?php endif; ?>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/table/toolbar.blade.php ENDPATH**/ ?>