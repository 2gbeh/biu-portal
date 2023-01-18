@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <x-pricelist :p="$data->dashboard_props">
        @foreach ($data->dashboard_props->cards as $items)
            <div class="row">
                @foreach ($items as $item)
                    <x-pricelist.item :p="$item" />
                @endforeach
            </div>
        @endforeach
    </x-pricelist>
@endsection
