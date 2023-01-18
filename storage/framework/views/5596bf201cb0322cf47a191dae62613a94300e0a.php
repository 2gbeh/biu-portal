<?php
$button_save_color = $button_save_color ?? 'primary';
$button_save_icon = $button_save_icon ?? 'fas fa-save';
$button_save_text = $button_save_text ?? 'Save';
?>

&nbsp;
<button type="submit" class="btn btn-<?php echo e($button_save_color); ?> waves-effect">
    <i class="<?php echo e($button_save_icon); ?> px-1"></i>
    <?php echo e($button_save_text); ?>

</button>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/button/save.blade.php ENDPATH**/ ?>