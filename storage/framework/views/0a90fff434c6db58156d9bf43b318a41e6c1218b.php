<?php
$button_sign_in_class = $button_sign_in_class ?? [];
$button_sign_in_text = $button_sign_in_text ?? 'Log in';
?>

<button type="submit" class="<?php echo e(trans('tw.btn.main', $button_sign_in_class)); ?>">
    <img src="<?php echo e(asset('images/dual_ring_blue.gif')); ?>" alt="..." />
    <span><?php echo e($button_sign_in_text); ?></span>
</button><?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/button/sign-in.blade.php ENDPATH**/ ?>