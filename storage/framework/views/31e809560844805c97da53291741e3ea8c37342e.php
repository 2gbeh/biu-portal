<?php
$alert_message = '';
$alert_status = $errors->first('status') ?: 404;

// $alert_message = 'When given a choice, take both. Start at the top and walk your way up.';
// $alert_status = 300;

foreach ($errors->all() as $value) {
    if (!is_numeric($value)) {
        $alert_message .= $value . '<br/>';
    }
}

if ($alert_status >= 100 && $alert_status < 200) {
    $alert_icon = 'info';
    $alert_color = 'attention';
} elseif ($alert_status >= 200 && $alert_status < 300) {
    $alert_icon = 'check';
    $alert_color = 'success';
} elseif ($alert_status >= 300 && $alert_status < 400) {
    $alert_icon = 'exclamation';
    $alert_color = 'warning';
} elseif ($alert_status >= 400 && $alert_status < 600) {
    $alert_icon = 'times';
    $alert_color = 'danger';
} else {
    $alert_icon = 'question';
    $alert_color = 'default';
}

// dd($alert_message, $alert_status, $alert_icon, $alert_color);

?>

<script type="text/javascript">
    const handleAlert = () => {
        $('.tw-alert').fadeOut(100);
    };
</script>

<?php if(isset($alert_host)): ?>
    <div class="tw-alert" style="margin-top:70px;z-index:99;">
        <div class="tw-alert-content tw-alert-<?php echo e($alert_color); ?>" role="alert">
            <input type="button" onclick="handleAlert()" value="&times;" title="Close" style="color:#fff;margin-right:-10px;" />
            <div class="flex">
                <table>
                    <tr valign="top">
                        <td class="py-1 px-1">
                            <i class="fas fa-<?php echo e($alert_icon); ?>-circle"></i>
                        </td>
                        <td class="px-2">
                            <b><?php echo e(strtoupper($alert_color)); ?> %</b>
                            <p class="text-sm"><?php echo $alert_message; ?></p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="tw-alert">
        <div class="tw-alert-content tw-alert-<?php echo e($alert_color); ?>" role="alert">
            <input type="button" onclick="handleAlert()" value="&times;" title="Close" />
            <div class="flex">
                <div class="py-1 mr-4">
                    <i class="fas fa-<?php echo e($alert_icon); ?>-circle"></i>
                </div>
                <div>
                    <p class="font-bold"><?php echo e(strtoupper($alert_color)); ?> %</p>
                    <p class="text-sm"><?php echo $alert_message; ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/alert.blade.php ENDPATH**/ ?>