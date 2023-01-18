<?php
$button_toast_text = $button_toast_text ?? 'Application Submitted';
$button_toast_icon = $button_toast_icon ?? 'fas fa-check-circle';
$button_toast_color = $button_toast_color ?? 'success';
$button_toast_button = $button_toast_button ?? 'Complete';
?>

<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('assets/minible/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts_'); ?>
    <script src="<?php echo e(asset('assets/minible/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/minible/js/pages/sweet-alerts.init.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<button type="submit" data-text="<?php echo e($button_toast_text); ?>" id="sa-position"
    class="btn btn-<?php echo e($button_toast_color); ?> waves-effect waves-light">

    <i class="<?php echo e($button_toast_icon); ?> px-1"></i>

    <?php echo e($button_toast_button); ?>

</button>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/button/toast.blade.php ENDPATH**/ ?>