@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <x-table :p="$data->view_transactions_props">
            @php $p = $data->view_transactions_props->pager; @endphp

            @foreach ($p->data as $item)
                <tr>
                    <td style="width: 10px">{{ $p->offset }}</td>
                    @php $p->offset+= 1; @endphp

                    <x-table.time-br :p="$item['created_at']" />

                    @td($item['transaction'])

                    <td>
                        <x-badge.secondary :p="[$item['type'] => isset($item['type'])]" />
                        <x-badge.secondary :p="[$item['mode'] => isset($item['mode'])]" />
                    </td>
                    <td>
                        <x-text :p="['text' => $f::cash_($item['amount'])]" />
                    </td>
                    <td>
                        <x-badge.success :p="[$item['response_code'] => $item['response_code'] == '00']" />
                        <x-badge.danger :p="[$item['response_code'] => $item['response_code'] != '00']" />
                    </td>

                    <x-table.avatar :p="['text' => $item['user_name']]" />

                    @td($item['depositor'])
                    @td($item['narration'])

                    <x-table.open :p="$item['id']" />
                </tr>
            @endforeach
        </x-table>
    </div>
@endsection
