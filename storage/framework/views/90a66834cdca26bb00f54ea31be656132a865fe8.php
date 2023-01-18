<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'menu' => [
            'Upload Photo' => '#!',
            'Deactivate' => '#!',
        ],
        'avatar' => null,
        'title' => 'John Doe',
        'subtitle' => '<a href="mailto:jdoe@email.com">jdoe@email.com</a>',
        'action' => [
            [
                'href' => '#!',
                'class' => 'bg-success text-white',
                'icon' => 'fas fa-user-edit',
                'text' => 'Edit Profile',
            ],
            [
                'href' => '#!',
                'class' => 'bg-info text-white',
                'icon' => 'fas fa-user-lock',
                'text' => 'Change Password',
            ],
        ],
        'list' => [
            'Phone' => '+2348169960927',
            'Address' => 'UK',
            'Joined' => '1992-09-15 15:00:00',
        ],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'menu' => [
            'Upload Photo' => '#!',
            'Deactivate' => '#!',
        ],
        'avatar' => null,
        'title' => 'John Doe',
        'subtitle' => '<a href="mailto:jdoe@email.com">jdoe@email.com</a>',
        'action' => [
            [
                'href' => '#!',
                'class' => 'bg-success text-white',
                'icon' => 'fas fa-user-edit',
                'text' => 'Edit Profile',
            ],
            [
                'href' => '#!',
                'class' => 'bg-info text-white',
                'icon' => 'fas fa-user-lock',
                'text' => 'Change Password',
            ],
        ],
        'list' => [
            'Phone' => '+2348169960927',
            'Address' => 'UK',
            'Joined' => '1992-09-15 15:00:00',
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

<div class="col-xl-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="text-center">

                <?php if(isset($p->menu)): ?>
                    <div class="dropdown float-end">
                        <a class="text-body dropdown-toggle font-size-18" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true">
                            <i class="fas fa-caret-down"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            <?php $__currentLoopData = $p->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $text => $href): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="dropdown-item" href="<?php echo e(url($href)); ?>">
                                    <?php echo $text; ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="clearfix"></div>
                <div>
                    <img src="<?php echo e(asset($p->avatar ?? 'images/avatar.png')); ?>" alt=""
                        class="avatar-lg rounded-circle img-thumbnail" />
                </div>

                <h5 class="mt-3 mb-1"><?php echo $p->title; ?></h5>

                <p class="font-size-15"><?php echo $p->subtitle; ?></p>

                <div class="mt-4">
                    <?php $__currentLoopData = $p->action; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($item['href']); ?>" class="btn btn-sm px-2 py-1 <?php echo e($item['class']); ?>">
                            <i class="<?php echo e($item['icon']); ?> me-1"></i>
                            <?php echo $item['text']; ?>

                        </a> &nbsp;
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <hr class="my-4">

            <div class="text-muted">
                <div class="table-responsive mt-4">
                    <?php $__currentLoopData = $p->list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mb-2">
                            <h5 class="mb-1 font-size-14 fw-bol"><?php echo $name; ?></h5>
                            <p class="font-size-160"><?php echo $value; ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/card/profile.blade.php ENDPATH**/ ?>