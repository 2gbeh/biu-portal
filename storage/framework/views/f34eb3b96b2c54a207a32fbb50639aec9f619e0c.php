<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'image' => 'images/avatar.png',
        'text' => 'Mark Legends',
    ],
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'image' => 'images/avatar.png',
        'text' => 'Mark Legends',
    ],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
$p = is_array($p) ? (object) $p : $p;
?>

<td>
    <?php if(isset($p->image)): ?>
        <img src="<?php echo e(asset($p->image)); ?>" alt="" class="avatar-xs rounded-circle me-2">
    <?php else: ?>
        <div class="avatar-xs d-inline-block me-2">
            <span class="avatar-title rounded-circle bg-light text-body font-size-10 bg-soft-info">
                <?php
                    $arr = explode(' ', $p->text);
                    if (count($arr) > 1) {
                        echo strtoupper($arr[0][0] . $arr[1][0]);
                    } else {
                        echo strtoupper($arr[0][0]);
                    }                    
                ?>
            </span>
        </div>
    <?php endif; ?>
    <span><?php echo $p->text; ?></span>
</td>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/table/avatar.blade.php ENDPATH**/ ?>