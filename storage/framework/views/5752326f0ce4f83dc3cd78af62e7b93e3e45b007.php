<?php
$button_sign_out_action = $button_sign_out_action ?? 'admin/logout';
$button_sign_out_text = $button_sign_out_text ?? 'Logout';
?>

<script type="text/javascript">
    const handleButtonSignOut = (event, this_) => {
        event.preventDefault();
        if (confirm("Are you sure ?") === true) {
            this_.submit();
        }
    };
</script>

<form action="<?php echo e(url($button_sign_out_action)); ?>" onsubmit="handleButtonSignOut(event, this)" method="POST"
    class="logout-form">
    <?php echo csrf_field(); ?>
    <button type="submit" style="min-width:90px; text-align:left;">
        <?php echo e($button_sign_out_text); ?>

    </button>
</form>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/button/sign-out.blade.php ENDPATH**/ ?>