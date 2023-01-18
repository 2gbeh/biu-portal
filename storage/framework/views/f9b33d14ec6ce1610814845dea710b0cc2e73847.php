<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'button' => ['color' => 'danger', 'icon' => 'far fa-trash-alt', 'text' => 'Delete Selected', 'event' => 'handleTableInbox()'],
        'input' => ['action' => 'logs.show', 'name' => 'slug', 'disabled' => 'disabled'],
        'list' => [
            [
                'id' => 1,
                'subject' => 'Peter, me (3)',
                'message' => 'Hello – Trip home from Colombo has been arranged then Jenna will come get me from Stockholm. :p',
                'created_at' => date('Y-m-d  H:i:s'),
            ],
            [
                'id' => 2,
                'subject' => 'me, Susanna (7)',
                'message' => '<span class="badge bg-warning me-2">Social</span> Since you asked... and i\'m inconceivably bored at the train station – Alright thanks. I\'ll have to re-book that somehow, i\'ll get back to you.',
                'created_at' => '2022-05-04 09:00:00',
            ],
        ],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'button' => ['color' => 'danger', 'icon' => 'far fa-trash-alt', 'text' => 'Delete Selected', 'event' => 'handleTableInbox()'],
        'input' => ['action' => 'logs.show', 'name' => 'slug', 'disabled' => 'disabled'],
        'list' => [
            [
                'id' => 1,
                'subject' => 'Peter, me (3)',
                'message' => 'Hello – Trip home from Colombo has been arranged then Jenna will come get me from Stockholm. :p',
                'created_at' => date('Y-m-d  H:i:s'),
            ],
            [
                'id' => 2,
                'subject' => 'me, Susanna (7)',
                'message' => '<span class="badge bg-warning me-2">Social</span> Since you asked... and i\'m inconceivably bored at the train station – Alright thanks. I\'ll have to re-book that somehow, i\'ll get back to you.',
                'created_at' => '2022-05-04 09:00:00',
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

<script type="text/javascript">
    const handleTableInbox = () => {
        if (confirm("Are you sure ?") === true) {
            const form = document.getElementById('form-host');
            const formData = new FormData(form);
            console.dir(formData);
        }
    };
</script>

<div class="card">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.host','data' => ['method' => 'DELETE']]); ?>
<?php $component->withName('form.host'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['method' => 'DELETE']); ?>

        <div class="card-body" role="toolbar">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.table.toolbar','data' => ['p' => $p]]); ?>
<?php $component->withName('table.toolbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['p' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($p)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>

        <ul class="message-list">
            <?php $__currentLoopData = $p->list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    if ($loop->index < 1) {
                        $item['status'] = 'unread';
                        $item['color'] = '';
                    } else {
                        $item['status'] = 'read';
                        $item['color'] = 'text-warning';
                    }
                    $item['url'] = $url::show($item['id']);
                ?>

                <li class="<?php echo e($item['status']); ?>">
                    <div class="col-mail col-mail-1">
                        <div class="checkbox-wrapper-mail">
                            <input type="checkbox" id="form-control-<?php echo e($loop->iteration); ?>" name="ids[]"
                                value="<?php echo e($item['id']); ?>" />
                            <label for="form-control-<?php echo e($loop->iteration); ?>" class="toggle"></label>
                        </div>

                        <a href="<?php echo e(url($item['url'])); ?>" class="title">
                            <?php echo $f::wrap($item['subject'], 25); ?>

                        </a>

                        <span class="<?php echo e($item['color']); ?> far fa-star"></span>
                    </div>
                    <div class="col-mail col-mail-2">
                        <a href="<?php echo e(url($item['url'])); ?>" class="subject">
                            <?php echo $f::wrap($item['message'], 180); ?>

                        </a>

                        <time class="date">
                            <?php echo e($f::dioxide($item['created_at'])); ?>

                        </time>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

        <div class="card-body">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.table.pager','data' => ['p' => $p]]); ?>
<?php $component->withName('table.pager'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['p' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($p)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/table/inbox.blade.php ENDPATH**/ ?>