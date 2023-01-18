@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row">
        <x-table :p="$data->manage_courses_props">
            @php $p = $data->manage_courses_props->pager; @endphp

            @forelse ($p->data as $item)
                <tr>
                    <td style="width: 10px">{{ $p->offset }}</td>
                    @php $p->offset+= 1; @endphp
                    
                    @td($item['course_title'])
                    @td($item['course_code'])
                    @td($item['credit_load'])
                    
                    <td>
                        <x-badge.primary :p="[$item['course_type'] => 'Compulsory']" />
                        <x-badge.success :p="[$item['course_type'] => 'Core']" />
                        <x-badge.warning :p="[$item['course_type'] => 'Elective']" />
                        <x-badge.danger :p="[$item['course_type'] => 'Mandatory']" />
                    </td>

                    <x-table.time-br :p="$item['created_at']" />
                    <x-table.item />
                </tr>
            @empty
                <x-table.empty />
            @endforelse
        </x-table>
    </div>
@endsection
