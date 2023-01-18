@php
$nav_group = $nav_group ?? [
    'a' => [],
    'b' => [],
    'i' => 'fi fi-rs-address-book',
    'dt' => 'Accounts',
    'dd' => [
        [
            'a' => ['href' => '/admin/create', 'target' => ''],
            'b' => [],
            'i' => 'fi fi-rs-user-add',
            'dt' => 'Add New',
            'dd' => [],
        ],
        [
            'a' => ['href' => '/admin', 'target' => ''],
            'b' => ['color' => 'danger', 'text' => 15],
            'i' => 'fi fi-rs-list-check',
            'dt' => 'Manage',
            'dd' => [],
        ],
    ],
];
@endphp

<li>
    <a href="javascript:void(0);" class="has-arrow waves-effec">
        <i class="{{ $nav_group['i'] }}"></i>
        <span style="white-space:nowrap;">{!! $nav_group['dt'] !!}</span>
    </a>
    <ul class="sub-menu" aria-expanded="false" style="margin-left:-20px;">
        @foreach ($nav_group['dd'] as $nav_item)
            <li style="white-space:nowrap;">
                <a href="{{ url($nav_item['a']['href']) }}" target="{{ $nav_item['a']['target'] }}">
                    @if (count($nav_item['b']) > 0)
                        <span style="margin-top:2px;"
                            class="badge rounded-pill fw-bold bg-{{ $nav_item['b']['color'] ?? 'danger' }} float-end">
                            {{ $nav_item['b']['text'] ?? 'new' }}
                        </span>
                    @endif
                    @isset($nav_item['i'])
                        <i class="{{ $nav_item['i'] }}"></i>
                    @endisset
                    <span style="white-space:nowrap;">{!! $nav_item['dt'] !!}</span>
                </a>
            </li>
        @endforeach
    </ul>
</li>
