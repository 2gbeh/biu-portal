@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <x-table.datatable :p="$data->view_policies_props">
        @foreach ($data->view_policies_props->tbody as $item)
            <tr>
                <x-table.iter :p="$loop" />

                @td($item['policy'])

                <td>
                    @i($item['icon'] . ' mx-2')
                    @out($item['icon'])
                </td>

                <x-table.time-br :p="$item['created_at']" />
                <x-table.item />
            </tr>
        @endforeach
    </x-table.datatable>
@endsection
