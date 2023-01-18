@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <x-table.datatable :p="$data->view_levels_props">
            @foreach ($data->view_levels_props->tbody as $item)
                <tr>
                    <x-table.iter :p="$loop" />

                    @td($item['name'])
                    @td($item['value'])

                    <x-table.item />
                </tr>
            @endforeach

        </x-table.datatable>
    </div>
@endsection
