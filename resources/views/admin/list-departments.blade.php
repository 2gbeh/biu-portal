@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <x-table.datatable :p="$data->view_departments_props">
            @foreach ($data->view_departments_props->tbody as $item)
                <tr>
                    <x-table.iter :p="$loop" />

                    @td($item['value'])

                    <x-table.item />
                </tr>
            @endforeach

        </x-table.datatable>
    </div>
@endsection
