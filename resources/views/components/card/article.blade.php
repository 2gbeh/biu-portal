@props([
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
])

@includeWhen(!isset($x['card-body']), 'shared.div')

<h5 class="header-title">{!! $p->title !!}</h5>

<p class="sub-header">{!! $p->subtitle !!}</p>

<div>{!! $p->article !!}</div>

@includeWhen(!isset($x['card-body']), 'shared.div', ['div' => 2])
