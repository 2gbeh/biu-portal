@extends('layouts.index')

@section('app', $data->breadcrumb['breadcrumb_base'])
@section('page', $data->breadcrumb['breadcrumb_page'])


@push('styles')
    <link href="{{ asset('css/jrad-compact.css') }}" rel="stylesheet">
@endpush

@section('body')

    <body class="search-layout">
        @includeWhen(count($errors) > 0, 'shared.alert')

        <header>
            <a href="{{ url('admin/search/history') }}" id="history">
                <i class="fi fi-rs-time-past" title="History (Ctrl+H)"></i>
            </a>
            <a href="{{ url('admin/dashboard') }}" id="home">
                <i class="fi fi-rs-home" title="Home"></i>
            </a>
        </header>

        <main>
            <img src="{{ asset('images/prism.gif') }}" alt="" class="logo" />

            <x-form.host>
                <div class="form-group">
                    <x-form.items :p="$data->form_control_props" />

                    <i class="fas fa-search"></i>
                </div>
            </x-form.host>

            <article>
                <abbr>PRISM&trade;</abbr>
                is a proprietary internal search console and analytics tool developed at
                <span>Pear SDC&reg;</span>
            </article>

            @php
                $images = ['images/avatar_m.png', 'images/avatar_f.png'];
                $rows = $data->top_search_props;
                $k = 0;
            @endphp
            @for ($i = 0; $i < 3; $i++)
                <ul>
                    @for ($j = 0; $j < 8; $j++)
                        @php
                            $k += 1;
                            shuffle($images);
                        @endphp
                        <li>
                            <a href="{{ url('admin/search/' . $k) }}" title="{{ $f::name($rows[$k]->name) }}">

                                <i style="background-image:url({{ asset($images[0]) }});">&nbsp;</i>

                                <p>{!! $f::wrap($f::name($rows[$k]->name), 25) !!}</p>
                            </a>
                        </li>
                    @endfor
                </ul>
            @endfor
        </main>


    </body>
@endsection
