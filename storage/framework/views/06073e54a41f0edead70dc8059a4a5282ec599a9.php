<?php
$button_done_color = $button_done_color ?? 'primary';
$button_done_icon = $button_done_icon ?? 'fas fa-check-circle';
$button_done_text = $button_done_text ?? 'Done';
?>

&nbsp;
<button type="submit" class="btn btn-<?php echo e($button_done_color); ?> waves-effect">
    <i class="<?php echo e($button_done_icon); ?> px-1"></i>
    <?php echo e($button_done_text); ?>

</button>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/button/done.blade.php ENDPATH**/ ?>