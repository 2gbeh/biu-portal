@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <x-form.datatable :p="$data->view_permissions_props->form" />

    <x-table.datatable :p="$data->view_permissions_props">
        @foreach ($data->view_permissions_props->tbody as $item)
            <tr>
                <x-table.iter :p="$loop" />

                @td($item['role'])
                @td($item['gate'])

                <x-table.time-br :p="$item['created_at']" />
                <x-table.item />
            </tr>
        @endforeach
    </x-table.datatable>
@endsection
