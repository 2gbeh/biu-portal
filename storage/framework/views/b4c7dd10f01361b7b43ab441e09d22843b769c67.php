<?php $guestContent = app('App\Services\GuestContentService'); ?>



<?php $__env->startSection('page', 'Log in'); ?>

<?php $__env->startSection('content'); ?>

    <script type="text/javascript">
        const handleAutofill = () => {
            $('#email').val('student@test.com');
            $('#password').val('password');
            $('#remember').prop('checked', true);
        };
    </script>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.guest','data' => ['action' => 'user/student/login']]); ?>
<?php $component->withName('form.guest'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['action' => 'user/student/login']); ?>
        <label class="block text-sm">
            <span class="<?php echo e(trans('tw.label')); ?>">Email or username</span>
            <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" class="<?php echo e(trans('tw.input')); ?>"
                placeholder="example@biu.edu.ng" required />
        </label>

        <label class="block text-sm fi-group">
            <span class="<?php echo e(trans('tw.label')); ?>">Password</span>
            <input type="password" id="password" name="password" id="password" value="<?php echo e(old('password')); ?>"
                class="<?php echo e(trans('tw.input')); ?>" placeholder="**** ****" required ondblclick="handleAutofill()" />
            <i class="fi fi-rs-eye" id="spy" title="Show"></i>
        </label>

        <div class="flex mt-1 text-sm">
            <label class="flex items-center">
                <input type="checkbox" id="remember" name="remember"
                    <?php if(old('remember') == 'on'): ?> checked="checked" <?php endif; ?> class="<?php echo e(trans('tw.null')); ?>" />

                

                <span class="ml-2 text-gray-600">
                    Keep me signed in
                </span>
            </label>
        </div>

        <?php if ($__env->exists('shared.button.sign-in', $guestContent->authLoginProps())) echo $__env->make('shared.button.sign-in', $guestContent->authLoginProps(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <p class="ruler">&nbsp;</p>

    <?php if ($__env->exists('shared.button.oauth', $guestContent->authOAuthProps())) echo $__env->make('shared.button.oauth', $guestContent->authOAuthProps(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <p class="mt-4 nav-links">
        <a class="<?php echo e(trans('tw.nav-link')); ?>" href="<?php echo e(url('user/student/forgot-password')); ?>">
            Forgot your password?
        </a> <br />
        <a class="<?php echo e(trans('tw.nav-link')); ?>" href="<?php echo e(url('user/student/register')); ?>">
            Don't have an account? Sign up
        </a>
    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vudo\resources\views/user/student/login.blade.php ENDPATH**/ ?>