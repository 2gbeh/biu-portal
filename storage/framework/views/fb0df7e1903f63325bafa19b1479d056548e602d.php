<?php $attributes = $attributes->exceptProps([
    'p' => (object) [
        'title' => 'Bootstrap-session-timeout',
        'subtitle' => 'Session timeout and keep-alive control with a nice Bootstrap warning dialog.',
        'article' => '<p>
          After a set amount of idle time, a Bootstrap warning dialog is shown
          to the user with the option to either log out, or stay connected. If
          "Logout" button is selected, the page is redirected to a logout URL.
          If "Stay Connected" is selected the dialog closes and the session is
          kept alive. If no option is selected after another set amount of
          idle time, the page is automatically redirected to a set timeout
          URL.
        </p>
        <p>
            Idle time is defined as no mouse, keyboard or touch event activity registered by
            the browser.
        </p>
        <p class="mb-0">
            As long as the user is active, the (optional) keep-alive URL keeps
            getting pinged and the session stays alive. If you have no need to
            keep the server-side session alive via the keep-alive URL, you can
            also use this plugin as a simple lock mechanism that redirects to
            your lock-session or log-out URL after a set amount of idle time.
        </p>',
    ],
    'x' => null,
]); ?>
<?php foreach (array_filter(([
    'p' => (object) [
        'title' => 'Bootstrap-session-timeout',
        'subtitle' => 'Session timeout and keep-alive control with a nice Bootstrap warning dialog.',
        'article' => '<p>
          After a set amount of idle time, a Bootstrap warning dialog is shown
          to the user with the option to either log out, or stay connected. If
          "Logout" button is selected, the page is redirected to a logout URL.
          If "Stay Connected" is selected the dialog closes and the session is
          kept alive. If no option is selected after another set amount of
          idle time, the page is automatically redirected to a set timeout
          URL.
        </p>
        <p>
            Idle time is defined as no mouse, keyboard or touch event activity registered by
            the browser.
        </p>
        <p class="mb-0">
            As long as the user is active, the (optional) keep-alive URL keeps
            getting pinged and the session stays alive. If you have no need to
            keep the server-side session alive via the keep-alive URL, you can
            also use this plugin as a simple lock mechanism that redirects to
            your lock-session or log-out URL after a set amount of idle time.
        </p>',
    ],
    'x' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php echo $__env->renderWhen(!isset($x['card-body']), 'shared.div', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

<h5 class="header-title"><?php echo $p->title; ?></h5>

<p class="sub-header"><?php echo $p->subtitle; ?></p>

<div><?php echo $p->article; ?></div>

<?php echo $__env->renderWhen(!isset($x['card-body']), 'shared.div', ['div' => 2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php /**PATH C:\xampp\htdocs\vudo\resources\views/components/card/article.blade.php ENDPATH**/ ?>