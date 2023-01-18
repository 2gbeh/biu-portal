<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <title>@yield('page', 'Home') &bull; @yield('app', env('APP_NAME'))</title>

    <!-- Fonts -->
    @stack('fonts')

    <!-- Styles -->
    <link href="{{ asset('assets/font-awesome-5.15.4/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/uicons/uicons-regular-straight.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
    @stack('styles')

    <!-- Scripts -->
    <script src="{{ asset('assets/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/polaris.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(() => {
            autofill(0);
            togglePassword();
        });
    </script>
    @stack('scripts')
</head>

@yield('body')

</html>
