@inject('hostContent', 'App\Services\HostContentService')

@extends('layouts.host.container')

@section('container')

    <body class="host-layout" data-sidebar="light" data-topbar="dark">
        @includeWhen(count($errors) > 0, 'shared.alert', ['alert_host' => true])

        <div id="layout-wrapper">
            @includeIf('shared.header.index', $hostContent->headerProps())

            @includeIf('shared.nav.index', $hostContent->navProps())

            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                @includeIf('shared.breadcrumb', $data->breadcrumb)
                            </div>
                        </div>

                        @yield('content')
                    </div>
                </div>
                @includeIf('shared.footer', $hostContent->footerProps())
                @includeIf('shared.chatbot', $hostContent->chatbotProps())

            </div>
        </div>
        {{-- @includeIf('shared.aside') --}}

        <!-- Scripts -->
        {{-- <script src="{{ asset('assets/minible/libs/jquery/jquery.min.js') }}"></script> --}}
        <script src="{{ asset('assets/minible/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/minible/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/minible/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/minible/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/minible/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/minible/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>

        @stack('scripts_')

        <script src="{{ asset('assets/minible/js/app.js') }}"></script>
    </body>
@endsection
