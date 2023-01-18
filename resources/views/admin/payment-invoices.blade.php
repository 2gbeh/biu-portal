@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <x-table :p="$data->view_invoices_props">
            @php $p = $data->view_invoices_props->pager; @endphp

            @foreach ($p->data as $item)
                <tr>
                    <td style="width: 10px">{{ $p->offset }}</td>
                    @php $p->offset+= 1; @endphp

                    @td($item['invoice'])

                    <td>
                        <x-badge.success :p="[$f::cash_($item['fee']) => isset($item['fee'])]" />
                    </td>
                    <td>
                        <x-badge.info :p="[$f::cash_($item['vat']) => isset($item['vat'])]" />
                    </td>

                    @td($item['gateway'])
                    @td($item['session_programme']['session'])
                    @td($item['session_programme']['programme_value'])

                    <x-table.time-br :p="$item['created_at']" />
                    <x-table.open :p="$item['id']" />
                </tr>
            @endforeach
        </x-table>
    </div>
@endsection
