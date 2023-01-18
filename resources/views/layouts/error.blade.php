@extends('layouts.index')

@push('styles')
    <link href="{{ asset('css/jrad-compact.css') }}" rel="stylesheet">
@endpush

@section('body')
    {{-- 404 and 403, 500, 419, 255, 405 --}}

    <body class="error-404">
        <header>
            <figure>
                <a href="" title="Reload">
                    <img src="{{ asset('images/logo.png') }}" alt="" />
                </a>
                <figcaption>
                    @yield('h1')

                    @yield('p')

                    <a href="{{ url()->previous() }}" class="btn">
                        <i class="fas fa-arrow-left"></i>
                        Go back
                    </a>
                </figcaption>
            </figure>
        </header>

        <footer>
            <img src="{{ asset('images/gideon.gif') }}" alt="" title="Gideon" />
        </footer>
    </body>
@endsection
