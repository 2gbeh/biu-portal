<?php
$button_next_color = $button_next_color ?? 'success';
$button_next_icon = $button_next_icon ?? 'fas fa-arrow-circle-right';
$button_next_text = $button_next_text ?? 'Next';
?>

&nbsp;
<button type="submit" name="_next" class="btn btn-<?php echo e($button_next_color); ?> waves-effect">
    <i class="<?php echo e($button_next_icon); ?> px-1"></i>
    <?php echo e($button_next_text); ?>

</button>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/button/next.blade.php ENDPATH**/ ?>