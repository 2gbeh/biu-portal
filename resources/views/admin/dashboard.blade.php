@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <x-card.summary-icon :p="$data->total_employees_props" />
        </div>

        <div class="col-md-6 col-xl-3">
            <x-card.summary-icon :p="$data->total_students_props" />
        </div>

        <div class="col-md-6 col-xl-3">
            <x-card.summary-icon :p="$data->total_applicants_props" />
        </div>

        <div class="col-md-6 col-xl-3">
            <x-card.summary-chart :p="$data->total_transactions_props" />
        </div>
    </div> <!-- end row-->

    <div class="row">
        <div class="col-xl-9">
            <x-chart-column :p="$data->student_population_props" />
        </div>
        <div class="col-xl-3">
            <x-card.totaled :p="$data->systems_summary_props" />
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <x-card.table :p="$data->payment_logs_props">
                @forelse($data->payment_logs_props->list as $item)
                    <tr>
                        <x-table.avatar :p="['text' => $item['depositor']]" />

                        <td class="font-size-13 text-primary">@naira {{ $f::cash_($item['amount']) }}</td>
                        <td class="text-muted">{!! $f::wrap($item['narration'], 15) !!}</td>
                        <td>
                            <x-badge.success :p="['Success' => $item['response_code'] == '00']" />
                            <x-badge.danger :p="['Critical' => $item['response_code'] != '00']" />
                        </td>

                        <x-table.time-br :p="$item['created_at']" />
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">No data</td>
                    </tr>
                @endforelse
            </x-card.table>
        </div>
        <div class="col-xl-6">
            <x-card.timeline :p="$data->activity_logs_props">
                @forelse($data->activity_logs_props->list as $item)
                    <li class="feed-item">
                        <div class="feed-item-list">
                            <p class="text-muted mb-1 font-size-13">
                                {{ $f::ago($item['created_at']) }}
                                <small class="d-inline-block ms-1 text-primary">
                                    {{ $f::t_($item['created_at'], 'H:ia') }}
                                </small>
                            </p>
                            <p class="mb-0">
                                <b>{{ $item['user_name'] }}</b>

                                <span class="text-muted">({{ $item['ip'] }})</span>
                                performed <span class="text-warning">{{ $item['action'] }}</span>
                                on <span class="text-info">{{ $f::rmhost($item['route']) }}</span>
                                using {{ $item['notes'] }}
                            </p>
                        </div>
                    </li>
                @empty
                    <li class="feed-item">
                        <div class="feed-item-list">
                            No data
                        </div>
                    </li>
                @endforelse
            </x-card.timeline>
        </div>
    </div>
    <!-- end row -->

@endsection
