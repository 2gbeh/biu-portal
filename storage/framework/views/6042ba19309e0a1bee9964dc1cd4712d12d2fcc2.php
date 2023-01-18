<?php
$header_apps_tooltip = $header_apps_tooltip ?? 'Apps';
$header_apps_list = $header_apps_list ?? [
    [
        [
            'a' => [
                'href' => 'https://hwplabs.com/',
            ],
            'img' => [
                'src' => 'images/',
                'alt' => '',
            ],
            'i' => 'fas fa-globe',
            'text' => 'Website',
        ],
        [
            'a' => [
                'href' => 'https://hwplabs.com/webmail',
            ],
            'img' => [
                'src' => 'images/',
                'alt' => '',
            ],
            'i' => 'fas fa-at',
            'text' => 'Webmail',
        ],
        [
            'a' => [
                'href' => 'https://hwplabs.com/cpanel',
            ],
            'img' => [
                'src' => 'images/fab_cpanel.png',
                'alt' => '',
            ],
            'i' => '', // 'fas fa-server'
            'text' => 'cPanel',
        ],
    ],
];

// Ex. 'header_apps_keys' => ['fa' => 'i', 'a.text_alt' => 'text'],
if (isset($header_apps_keys)) {
    foreach ($header_apps_list as $i => $list) {
        $header_apps_list[$i] = $f::repl($list, $header_apps_keys);
    }
}
?>


<div class="dropdown d-none d-lg-inline-block ms-1">
    <button type="button" class="btn header-item noti-icon waves-effec" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false" title="<?php echo e($header_apps_tooltip); ?>">
        <i class="fi fi-rs-apps ico override-fg"></i>
    </button>

    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
        <div class="px-lg-2">
            <?php $__currentLoopData = $header_apps_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row g-0">
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col">
                            <a class="dropdown-icon-item" href="<?php echo e(url($item['a']['href'])); ?>" target="_new">
                                <?php if(strlen($item['i']) > 0): ?>
                                    <i class="<?php echo e($item['i']); ?>" style="font-size: 24px"></i>
                                <?php else: ?>
                                    <img src="<?php echo e(asset($item['img']['src'])); ?>" alt="<?php echo e($item['img']['alt']); ?>" />
                                <?php endif; ?>
                                <span><?php echo e($item['text']); ?></span>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/header/apps.blade.php ENDPATH**/ ?>