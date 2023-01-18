@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <x-table :p="$data->noticeboard_index_props">
            @php $p = $data->noticeboard_index_props->pager; @endphp

            @forelse ($p->data as $item)
                <tr>
                    <td style="width: 10px">{{ $p->offset }}</td>
                    @php $p->offset+= 1; @endphp

                    <x-table.time-br :p="$item['created_at']" />

                    @td($f::wrap($item['subject'], 25))
                    @td($f::wrap($item['message'], 100))
                    {{-- @forelse ($item['recipients'] as $recipient)
                        <x-table.item :p="['item' => 'badge', 'data' => $recipient]" />
                    @empty
                        <x-table.item :p="['item' => 'badge', 'data' => 'None']" />
                    @endforelse --}}

                    @forelse ($item['attachments'] as $attachment)
                        @td($f::link($attachment))
                    @empty
                        <x-table.item :p="['item' => 'badge', 'data' => 'None']" />
                    @endforelse

                    <x-table.open :p="$item['id']" />
                </tr>
            @empty
                <x-table.empty />
            @endforelse
        </x-table>
    </div>
@endsection
