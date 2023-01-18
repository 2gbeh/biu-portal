<?php
$div = $div ?? ['card', 'card-body']; // card|2
?>

<?php switch(gettype($div)):
    case ('integer'): ?>
        <?php for($i = 0; $i < $div; $i++): ?>
            </div>
        <?php endfor; ?>
    <?php break; ?>

    <?php case ('string'): ?>
        <div class="<?php echo e($div); ?>">
        <?php break; ?>

        <?php case ('array'): ?>
            <?php $__currentLoopData = $div; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="<?php echo e($d); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php break; ?>

        <?php default: ?>
    <?php endswitch; ?>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/shared/div.blade.php ENDPATH**/ ?>