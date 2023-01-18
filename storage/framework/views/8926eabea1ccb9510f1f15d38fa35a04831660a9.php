<?php $__env->startSection('page', $ctx->alias); ?>
<?php $__env->startSection('app', $ctx->name); ?>

<?php $__env->startPush('fonts'); ?>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('css/normalize.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('body'); ?>

    <body class="antialiased welcome">
        <div class="relative flex items-top justify-center min-h-screen nobg-gray-100 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <a href="" title="Reload (Ctrl+R)">
                        <img class="logo" src="<?php echo e(asset('images/typeface.png')); ?>" alt="<?php echo e($ctx->alias); ?>" style="width:300px;" />
                    </a>
                </div>

                <div class="mt-8 bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <?php if(isset($data->apps)): ?>
                            <?php $__currentLoopData = $data->apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->odd): ?>
                                    <div class="p-6 border-t border-gray-200">
                                <?php endif; ?>
                                <?php if($loop->even): ?>
                                    <div class="p-6 border-t border-gray-200 md:border-l">
                                <?php endif; ?>

                                <div class="flex items-center">
                                    <i class="<?php echo e($e['fi']); ?>"></i>
                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        <?php if(isset($e['a']['target'])): ?>
                                            <a href="<?php echo e($e['a']['href']); ?>" target="<?php echo e($e['a']['target']); ?>"
                                                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                    'h2-muted' => substr($e['a']['href'], 0, 1) == '#',
                                                    'text-gray-900 h2',
                                                ]) ?>">
                                                <?php echo e($e['a']['text']); ?>

                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo e($e['a']['href']); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                'h2-muted' => substr($e['a']['href'], 0, 1) == '#',
                                                'text-gray-900 h2',
                                            ]) ?>">
                                                <?php echo e($e['a']['text']); ?> </a>
                                        <?php endif; ?>

                                        <?php if(isset($e['sup'])): ?>
                                            <sup class="<?php echo e($e['sup']['class']); ?>">
                                                <?php echo e($e['sup']['text']); ?>

                                            </sup>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="ml-12">
                                    <p class="mt-2 text-gray-600 text-sm article">
                                        <?php echo $e['p']; ?>

                                    </p>
                                </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center address" style="font-size:15px;">
                        <?php echo $ctx->powered_by; ?>

                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    <?php if(isset($data->social)): ?>
                        <ul class="social">
                            <?php $__currentLoopData = $data->social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e($e['a']['href']); ?>" title="<?php echo e($e['a']['title']); ?>" target="_new">
                                        <i class="<?php echo e($e['i']); ?>"></i> &nbsp;
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        </div>
    </body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vudo\resources\views/welcome.blade.php ENDPATH**/ ?>