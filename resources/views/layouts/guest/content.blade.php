@inject('guestContent', 'App\Services\GuestContentService')

@extends('layouts.guest.container')

@section('container')

    <body class="guest-layout">
        @includeWhen(count($errors) > 0, 'shared.alert')

        <div class="flex items-center min-h-screen p-6 nobg-gray-50 nodark:bg-gray-900 parent-container">
            <div
                class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg noshadow-xl nodark:bg-gray-800 parent-wrapper">
                <div class="flex flex-col overflow-y-auto md:flex-row">

                    <div class="h-32 md:h-auto md:w-1/2 card-image">                        
                        <img aria-hidden="true" class="object-cover w-full h-full nodark:hidden"
                            src="{{ asset($guestContent->authImageProps()) }}" alt="" />
                    </div>

                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">

                            <figure class="form-legend">
                                <a href="/" title="Home">
                                    <img class="logo" src="{{ asset('images/logo.png') }}" alt="" />
                                </a>
                                <figcaption class="mb-4 text-xl font-semibold text-gray-700">
                                    {{ $portal }}
                                </figcaption>
                            </figure>

                            @yield('content')
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Scripts -->
        @stack('scripts_')
    </body>
@endsection
