<?php
$header_lang_tooltip = $header_lang_tooltip ?? 'Language';
$header_lang_list = $header_lang_list ?? [
    [
        'img' => ['src' => 'images/flag_nga.png', 'alt' => 'NGA'],
        'text' => 'Nigeria',
        'sup' => 'EN',
    ],
];

// dd($header_lang_list);

?>


<div class="dropdown d-inline-block language-switch" style="position:relative; top:-2px;">
    <?php if(count($header_lang_list) == 1): ?>
        <button type="button" class="btn header-item waves-effec" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" title="<?php echo e($header_lang_tooltip); ?>">
            <img src="<?php echo e(asset($header_lang_list[0]['img']['src'])); ?>" alt="<?php echo e($header_lang_list[0]['img']['alt']); ?>"
                height="16" class="override-fg">
            <span class="override-fg" style="margin-left:3px; font-size:12px;"><?php echo e($header_lang_list[0]['sup']); ?></span>
        </button>
    <?php else: ?>
        <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" title="Lang">
            <img src="<?php echo e(asset($header_lang_list[0]['img']['src'])); ?>" alt="<?php echo e($header_lang_list[0]['img']['alt']); ?>"
                height="16" class="override-fg">
            <sup class="override-fg" style="margin-left:3px; font-size:10px;"><?php echo e($header_lang_list[0]['sup']); ?></sup>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <?php $__currentLoopData = $header_lang_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="<?php echo e(asset($item['img'])); ?>" alt="user-image" class="me-1" height="12">
                    <span class="align-middle"><?php echo e($item['text']); ?></span>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/header/languages.blade.php ENDPATH**/ ?>