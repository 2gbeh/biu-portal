<?php
$button_clear_color = $button_clear_color ?? 'secondary';
$button_clear_icon = $button_clear_icon ?? 'fas fa-times-circle';
$button_clear_text = $button_clear_text ?? 'Clear';
?>

<button type="reset" class="btn btn-<?php echo e($button_clear_color); ?> waves-effect">
    <i class="<?php echo e($button_clear_icon); ?> px-1"></i>
    <?php echo e($button_clear_text); ?>

</button>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/button/clear.blade.php ENDPATH**/ ?>