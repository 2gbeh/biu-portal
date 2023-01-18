@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <x-table.spaced :p="$data->my_transactions_props">
            @php $p = $data->my_transactions_props->pager; @endphp

            @foreach ($p->data as $item)
                <tr>
                    <td style="width: 10px">{{ $p->offset }}</td>
                    @php $p->offset+= 1; @endphp

                    <x-table.time-br :p="$item['created_at']" />
                    
                    <td>
                        <x-badge.primary :p="[$f::cash_($item['amount']) => true]" />
                    </td>

                    @td($item['depositor'])
                    @td($item['narration'])
                    @td($item['transaction'])

                    <x-table.button :p="['color' => 'light', 'text' => $item['mode']]" />
                </tr>
            @endforeach
        </x-table.spaced>
    </div>
@endsection
