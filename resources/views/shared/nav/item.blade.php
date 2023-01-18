@php
$nav_item = $nav_item ?? [
    'a' => ['href' => 'admin/dashboard', 'target' => ''],
    'b' => [],
    'i' => 'fi fi-rs-dashboard',
    'dt' => 'Dashboard',
    'dd' => [],
];
@endphp

<li>
    <a href="{{ url($nav_item['a']['href']) }}" target="{{ $nav_item['a']['target'] }}">
        @if (count($nav_item['b']) > 0)
            <span style="margin-top:2px;"
                class="badge rounded-pill fw-bold bg-{{ $nav_item['b']['color'] ?? 'danger' }} float-end">
                {{ $nav_item['b']['text'] ?? 'new' }}
            </span>
        @endif
        <i class="{{ $nav_item['i'] }}"></i>
        <span style="white-space:nowrap;">{!! $nav_item['dt'] !!}</span>
    </a>
</li>
