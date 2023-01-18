@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <x-table :p="$data->activity_log_props">
            @php $p = $data->activity_log_props->pager; @endphp

            @forelse ($p->data as $item)
                <tr>
                    <td style="width: 10px">{{ $p->offset }}</td>
                    @php $p->offset+= 1; @endphp

                    <x-table.time-br :p="$item['created_at']" />

                    <x-table.avatar :p="['text' => $item['user_name']]" />

                    @td($item['ip'])

                    <td>
                        <x-badge.primary :p="[$item['request'] => 'GET']" />
                        <x-badge.success :p="[$item['request'] => 'POST']" />
                        <x-badge.warning :p="[$item['request'] => 'PATCH']" />
                        <x-badge.warning :p="[$item['request'] => 'PUT']" />
                        <x-badge.danger :p="[$item['request'] => 'DELETE']" />
                    </td>

                    @td($f::rmhost($item['route']))

                    <td>
                        @if (strpos($item['method'], 'App\Http\Controllers') !== false)
                            @out('__invoke')
                        @else
                            @out($item['method'])
                        @endif
                    </td>

                    <td>
                        @if (substr($item['action'], 0, 5) == 'SIGN_')
                            <x-text.primary :p="[$item['action'] => 'SIGN_UP']" />
                            <x-text.success :p="[$item['action'] => 'SIGN_IN']" />
                            <x-text.danger :p="[$item['action'] => 'SIGN_OUT']" />
                        @else
                            <x-text.secondary :p="[$item['action'] => $item['action']]" />
                        @endif
                    </td>

                    @td($item['notes'])
                </tr>
            @empty
                <x-table.empty />
            @endforelse
        </x-table>
    </div>
@endsection
