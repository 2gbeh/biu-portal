@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <x-table.datatable :p="$data->view_roles_props">
            @foreach ($data->view_roles_props->tbody as $item)
                <tr>
                    <x-table.iter :p="$loop" />

                    <td>
                        @out($item['role']) &nbsp;
                        <x-badge :p="['color' => 'secondary', 'text' => $item['assigned_to']]" />
                    </td>

                    <x-table.time-br :p="$item['created_at']" />
                    <x-table.item />
                </tr>
            @endforeach
        </x-table.datatable>
    </div>
@endsection
