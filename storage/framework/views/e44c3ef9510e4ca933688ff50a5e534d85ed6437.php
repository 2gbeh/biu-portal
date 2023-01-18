<?php $__env->startSection('app', $data->breadcrumb['breadcrumb_base']); ?>
<?php $__env->startSection('page', $data->breadcrumb['breadcrumb_page']); ?>


<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('css/jrad-compact.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('body'); ?>

    <body class="search-layout">
        <?php echo $__env->renderWhen(count($errors) > 0, 'shared.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

        <header>
            <a href="<?php echo e(url('admin/search/history')); ?>" id="history">
                <i class="fi fi-rs-time-past" title="History (Ctrl+H)"></i>
            </a>
            <a href="<?php echo e(url('admin/dashboard')); ?>" id="home">
                <i class="fi fi-rs-home" title="Home"></i>
            </a>
        </header>

        <main>
            <img src="<?php echo e(asset('images/prism.gif')); ?>" alt="" class="logo" />

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.host','data' => []]); ?>
<?php $component->withName('form.host'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <div class="form-group">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.controls','data' => ['p' => $data->form_control_props]]); ?>
<?php $component->withName('form.controls'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['p' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->form_control_props)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    <i class="fas fa-search"></i>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <article>
                <abbr>PRISM&trade;</abbr>
                is a proprietary internal search console and analytics tool developed at
                <span>Pear SDC&reg;</span>
            </article>

            <?php
                $images = ['images/avatar_m.png', 'images/avatar_f.png'];
                $rows = $data->top_search_props;
                $k = 0;
            ?>
            <?php for($i = 0; $i < 3; $i++): ?>
                <ul>
                    <?php for($j = 0; $j < 8; $j++): ?>
                        <?php
                            $k += 1;
                            shuffle($images);
                        ?>
                        <li>
                            <a href="<?php echo e(url('admin/search/' . $k)); ?>" title="<?php echo e($f::name($rows[$k]->name)); ?>">

                                <i style="background-image:url(<?php echo e(asset($images[0])); ?>);">&nbsp;</i>

                                <p><?php echo $f::wrap($f::name($rows[$k]->name), 25); ?></p>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
            <?php endfor; ?>
        </main>


    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vudo\resources\views/admin/search.blade.php ENDPATH**/ ?>