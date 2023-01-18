@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <x-form.datatable :p="$data->map_props->form" />

    <x-table.datatable :p="$data->map_props">
        @foreach ($data->map_props->tbody as $item)
            <tr>
                <x-table.iter :p="$loop" />
                
                @td($item['unit'])
                @td($item['department'])

                <x-table.time-br :p="$item['created_at']" />
                <x-table.item />
            </tr>
        @endforeach
    </x-table.datatable>
@endsection
