<?php $attributes = $attributes->exceptProps([
    'p' => [
        'photo' => 'etugbeh.png',
        'name' => 'Simon Ryles',
        'title' => 'Full Stack Developer',
        'links' => [
            [
                'href' => '#!',
                'icon' => 'uil uil-user',
                'text' => 'Profile',
            ],
            [
                'href' => '#!',
                'icon' => 'uil uil-envelope-alt',
                'text' => 'Message',
            ],
        ],
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => [
        'photo' => 'etugbeh.png',
        'name' => 'Simon Ryles',
        'title' => 'Full Stack Developer',
        'links' => [
            [
                'href' => '#!',
                'icon' => 'uil uil-user',
                'text' => 'Profile',
            ],
            [
                'href' => '#!',
                'icon' => 'uil uil-envelope-alt',
                'text' => 'Message',
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
    $photo_f = $p['photo'] ? 'storage/uploads/' . $p['photo'] : 'images/avatar.png';
?>

<div class="col-xl-3 col-sm-6">
    <div class="card text-center">
        <div class="card-body">
            <div class="dropdown float-end">
                <a class="text-body dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true">
                    <i class="uil uil-ellipsis-h"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">Email</a>
                    <a class="dropdown-item" href="#">Facebook</a>
                    <a class="dropdown-item" href="#">LinkedIn</a>
                </div>
            </div>
            <div class="clearfix"></div>

            <?php if(isset($p['photo'])): ?>
                <div class="mb-4">
                    <img src="<?php echo e(asset($photo_f)); ?>"
                        alt="" class="avatar-lg rounded-circle img-thumbnail">
                </div>
            <?php else: ?>
                <div class="avatar-lg mx-auto mb-4">
                    <div class="avatar-title bg-soft-primary rounded-circle text-primary">
                        <i class="mdi mdi-account-circle display-4 m-0 text-primary"></i>
                    </div>
                </div>
            <?php endif; ?>

            <h5 class="font-size-16 mb-1">
                <a href="#" class="text-dark">
                    <?php echo $p['name']; ?>

                </a>
            </h5>
            <p class="text-muted mb-2">
                <?php echo $p['title']; ?>

            </p>
        </div>

        <?php if(isset($p['links'])): ?>
            <div class="btn-group" role="group">
                <?php $__currentLoopData = $p['links']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($link['href']); ?>" class="btn btn-outline-light text-truncate">
                        <i class="<?php echo e($link['icon']); ?> me-1"></i>
                        <?php echo $link['text']; ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/card/user.blade.php ENDPATH**/ ?>