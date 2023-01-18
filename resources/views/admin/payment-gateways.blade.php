@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <x-table :p="$data->view_gateways_props">
            @php $p = $data->view_gateways_props->pager; @endphp

            @foreach ($p->data as $item)
                <tr>
                    <td style="width: 10px">{{ $p->offset }}</td>
                    @php $p->offset+= 1; @endphp

                    @td($item['gateway'])

                    <td>
                        <x-badge.success :p="[$f::cash_($item['charges']) => isset($item['charges'])]" />
                    </td>

                    <x-table.item :p="['item' => 'link', 'data' => $item['api_docs']]" />

                    <td>
                        @br($item['contact_name'])
                        <x-badge.secondary :p="[$item['contact_email'] => isset($item['contact_email'])]" />
                    </td>

                    <x-table.time-br :p="$item['created_at']" />
                    <x-table.open :p="$item['id']" />
                </tr>
            @endforeach
        </x-table>
    </div>
@endsection
