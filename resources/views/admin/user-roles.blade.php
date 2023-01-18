@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')

        <x-form.datatable :p="$data->user_role_props->form" />

        <x-table.datatable :p="$data->user_role_props">
            @forelse ($data->user_role_props->tbody as $item)
                <tr>
                    <x-table.iter :p="$loop" />
                    <x-table.avatar :p="['text' => $item['assignee']]" />

                    <td>
                        @i('far fa-star text-warning mx-2')
                        @out($item['assigned'])
                    </td>

                    <x-table.time-br :p="$item['created_at']" />
                    <x-table.item />
                </tr>
            @empty
                <x-table.empty />
            @endforelse

        </x-table.datatable>
@endsection
