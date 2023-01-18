    @extends('layouts.host.content')

    @section('page', $data->breadcrumb['breadcrumb_page'])

    @section('content')
        <x-table.datatable :p="$data->applicants_props">
            @forelse ($data->applicants_props->tbody as $item)
                <tr>
                    <x-table.iter :p="$loop" />
                    <x-table.time-br :p="$item['created_at']" />

                    @td($item->user->userProfile->whom)

                    <td>
                        @br($f::link($item->user['email']))
                        <x-badge.secondary :p="[$item->user->userProfile->phone_no => isset($item->user->userProfile->phone_no)]" />
                    </td>

                    @td($item->mapSessionsToProgramme->session)
                    @td($item->mapSessionsToProgramme->programmeValue)
                    @td($item->mapUnitsToProgramme->degree_unit)
                    @td($item->application_status)

                    <x-table.open :p="$item['id']" />
                </tr>
            @empty
                <x-table.empty />
            @endforelse

        </x-table.datatable>
    @endsection
