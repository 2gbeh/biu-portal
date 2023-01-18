    @extends('layouts.host.content')

    @section('page', $data->breadcrumb['breadcrumb_page'])

    @section('content')

        <x-form.datatable :p="$data->wifi_settings_props->form" />

        <x-table.datatable :p="$data->wifi_settings_props">
            @forelse ($data->wifi_settings_props->tbody as $item)
                <tr>
                    <x-table.iter :p="$loop" />

                    @td($f::link($item['username']))

                    <td>
                        @i('fas fa-key text-warning mx-2')
                        @out($item['password'])
                    </td>

                    <x-table.time :p="$item['created_at']" />
                    <x-table.item />
                </tr>
            @empty
                <x-table.empty />
            @endforelse

        </x-table.datatable>
    @endsection
