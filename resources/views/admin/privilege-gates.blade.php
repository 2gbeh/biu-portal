@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <x-table.datatable :p="$data->view_gates_props">
            @foreach ($data->view_gates_props->tbody as $item)
                <tr>
                    <x-table.iter :p="$loop" />

                    <td>
                        @out($item['gate']) &nbsp;
                        <x-badge.secondary :p="[$item['policy'] => $item['policy']]" />
                    </td>

                    @td($item['route'])

                    <td>
                        @i($item['icon'] . ' mx-2')
                        @out($item['icon'])
                    </td>

                    @td($item['badge'])

                    <x-table.time-br :p="$item['created_at']" />
                    <x-table.item />
                </tr>
            @endforeach
        </x-table.datatable>
    </div>
@endsection
