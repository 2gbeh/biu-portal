@extends('layouts.index')

@section('page', $ctx->alias)
@section('app', $ctx->name)

@push('fonts')
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
@endpush

@push('styles')
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
@endpush

@section('body')

    <body class="antialiased welcome">
        <div class="relative flex items-top justify-center min-h-screen nobg-gray-100 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <a href="" title="Reload (Ctrl+R)">
                        <img class="logo" src="{{ asset('images/typeface.png') }}" alt="{{ $ctx->alias }}" style="width:300px;" />
                    </a>
                </div>

                <div class="mt-8 bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        @isset($data->apps)
                            @foreach ($data->apps as $e)
                                @if ($loop->odd)
                                    <div class="p-6 border-t border-gray-200">
                                @endif
                                @if ($loop->even)
                                    <div class="p-6 border-t border-gray-200 md:border-l">
                                @endif

                                <div class="flex items-center">
                                    <i class="{{ $e['fi'] }}"></i>
                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        @if (isset($e['a']['target']))
                                            <a href="{{ $e['a']['href'] }}" target="{{ $e['a']['target'] }}"
                                                @class([
                                                    'h2-muted' => substr($e['a']['href'], 0, 1) == '#',
                                                    'text-gray-900 h2',
                                                ])>
                                                {{ $e['a']['text'] }}
                                            </a>
                                        @else
                                            <a href="{{ $e['a']['href'] }}" @class([
                                                'h2-muted' => substr($e['a']['href'], 0, 1) == '#',
                                                'text-gray-900 h2',
                                            ])>
                                                {{ $e['a']['text'] }} </a>
                                        @endif

                                        @isset($e['sup'])
                                            <sup class="{{ $e['sup']['class'] }}">
                                                {{ $e['sup']['text'] }}
                                            </sup>
                                        @endisset
                                    </div>
                                </div>
                                <div class="ml-12">
                                    <p class="mt-2 text-gray-600 text-sm article">
                                        {!! $e['p'] !!}
                                    </p>
                                </div>
                        </div>
                        @endforeach
                    @endisset
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center address" style="font-size:15px;">
                        {!! $ctx->powered_by !!}
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    @isset($data->social)
                        <ul class="social">
                            @foreach ($data->social as $e)
                                <li>
                                    <a href="{{ $e['a']['href'] }}" title="{{ $e['a']['title'] }}" target="_new">
                                        <i class="{{ $e['i'] }}"></i> &nbsp;
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endisset
                </div>
            </div>
        </div>
        </div>
    </body>

@endsection
