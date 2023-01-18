@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <x-table :p="$data->manage_accounts_props">
            @php $p = $data->manage_accounts_props->pager; @endphp

            @forelse ($p->data as $item)
                <tr>
                    <td style="width: 10px">{{ $p->offset }}</td>
                    @php $p->offset+= 1; @endphp

                    <x-table.time-br :p="$item['created_at']" />
                    <x-table.avatar :p="['text' => $item['name']]" />

                    <td>
                        @br($f::link($item['email']))
                        <x-badge.secondary :p="['Verified' => isset($item['email_verified_at'])]" />
                        <x-badge.secondary :p="['Subscribed' => isset($item['email_subscribed_at'])]" />
                    </td>
                    <td>
                        <x-badge.success :p="['Yes' => isset($item['password_changed_at'])]" />
                        <x-badge.danger :p="['No' => !isset($item['password_changed_at'])]" />
                    </td>

                    @td($item['auth'])
                    @td($item['uuid'])

                    <x-table.item />
                </tr>
            @empty
                <x-table.empty />
            @endforelse
        </x-table>
    </div>
@endsection
