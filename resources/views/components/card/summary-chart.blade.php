@props([
    'p' => (object) [
        'chart' => 3,
        'currency' => '$',
        'value' => 34152.0,
        'label' => 'Total Revenue',
        'stats' => [
            [
                'color' => 'success',
                'arrow' => 'up',
                'value' => '2.65%',
                'label' => 'since last week',
            ],
        ],
    ],
])

@php
$card_summary_charts = [null, 'total-revenue-chart', 'orders-chart', 'customers-chart', 'growth-chart'];
@endphp

@push('scripts_')
    <script src="{{ asset('assets/minible/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/minible/js/pages/dashboard.init.js') }}"></script>
@endpush

<div class="card">
    <div class="card-body">
        <div class="float-end mt-2">
            <div id="{{ $card_summary_charts[$p->chart ?? 3] }}"></div>
        </div>
        <div>
            <h4 class="mb-1 mt-1">
                {!! $p->currency !!}
                <span data-plugin="counterup">{{ $f::cash_($p->value) }}</span>
            </h4>
            <p class="text-muted mb-0 fw-bol">{{ $p->label }}</p>
        </div>
        <p class="text-muted mt-3 mb-0">
            @foreach ($p->stats as $stat)
                <span class="text-{{ $stat['color'] }} me-1">
                    <i class="mdi mdi-arrow-{{ $stat['arrow'] }}-bold me-1"></i>
                    <var style="margin-left:-5px;font-style:normal;">
                        {{ $stat['value'] }}
                    </var>
                </span>
                <span style="margin-left:-3px;">{{ $stat['label'] }}</span> &nbsp;
            @endforeach
        </p>
    </div>
</div>
