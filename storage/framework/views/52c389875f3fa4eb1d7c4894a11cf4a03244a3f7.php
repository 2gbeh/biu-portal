<?php $guestContent = app('App\Services\GuestContentService'); ?>



<?php $__env->startSection('page', 'Register'); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.guest','data' => ['action' => 'register.store']]); ?>
<?php $component->withName('form.guest'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['action' => 'register.store']); ?>
        <label class="block text-sm">
            <span class="<?php echo e(trans('tw.label')); ?>">Name or username</span>
            <input type="search" name="name" value="<?php echo e(old('name')); ?>" class="<?php echo e(trans('tw.input')); ?>"
                placeholder="N/b: Surname first" required />
        </label>

        <label class="block text-sm">
            <span class="<?php echo e(trans('tw.label')); ?>">Email</span>
            <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="<?php echo e(trans('tw.input')); ?>"
                placeholder="example@biu.edu.ng" required />
        </label>

        <label class="block text-sm fi-group">
            <span class="<?php echo e(trans('tw.label')); ?>">Password</span>
            <input type="password" name="password" id="password" value="<?php echo e(old('password')); ?>"
                class="<?php echo e(trans('tw.input')); ?>" placeholder="**** ****" required />
            <i class="fi fi-rs-eye" id="spy" title="Show"></i>
        </label>

        <label class="block text-sm">
            <span class="<?php echo e(trans('tw.label')); ?>">Confirm Password</span>
            <input type="password" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>"
                class="<?php echo e(trans('tw.input')); ?>" placeholder="**** ****" required />
        </label>

        <input type="hidden" name="auth" value="STAFF" />

        <?php if ($__env->exists('shared.button.sign-in', $guestContent->authRegisterProps())) echo $__env->make('shared.button.sign-in', $guestContent->authRegisterProps(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>


    <p class="mt-4 nav-links">
        <a class="<?php echo e(trans('tw.nav-link')); ?>" href="<?php echo e(route('login')); ?>">
            Already have an account? Sign in
        </a>
    </p>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vudo\resources\views/user/student//register.blade.php ENDPATH**/ ?>