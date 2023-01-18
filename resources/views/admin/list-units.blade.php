@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <x-table.datatable :p="$data->view_units_props">
        @foreach ($data->view_units_props->tbody as $item)
            <tr>
                <x-table.iter :p="$loop" />

                @td($item['value'])

                <x-table.item />
            </tr>
        @endforeach

    </x-table.datatable>
@endsection
