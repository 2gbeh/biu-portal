<?php $guestContent = app('App\Services\GuestContentService'); ?>



<?php $__env->startSection('page', 'Reset Password'); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.guest','data' => ['action' => 'password.email']]); ?>
<?php $component->withName('form.guest'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['action' => 'password.email']); ?>
        <label class="block text-sm">
            <span class="<?php echo e(trans('tw.label')); ?>">Email address</span>
            <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="<?php echo e(trans('tw.input')); ?>"
                placeholder="example@biu.edu.ng" required />
        </label>

        <?php if ($__env->exists('shared.button.sign-in', $guestContent->authForgotPasswordProps())) echo $__env->make('shared.button.sign-in', $guestContent->authForgotPasswordProps(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <p class="mt-4 nav-links">
        <a class="<?php echo e(trans('tw.nav-link')); ?>" href="<?php echo e(url('admin/login')); ?>">
            Return to previous page
        </a>
    </p>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vudo\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>