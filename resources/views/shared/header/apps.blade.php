@php
$header_apps_tooltip = $header_apps_tooltip ?? 'Apps';
$header_apps_list = $header_apps_list ?? [
    [
        [
            'a' => [
                'href' => 'https://hwplabs.com/',
            ],
            'img' => [
                'src' => 'images/',
                'alt' => '',
            ],
            'i' => 'fas fa-globe',
            'text' => 'Website',
        ],
        [
            'a' => [
                'href' => 'https://hwplabs.com/webmail',
            ],
            'img' => [
                'src' => 'images/',
                'alt' => '',
            ],
            'i' => 'fas fa-at',
            'text' => 'Webmail',
        ],
        [
            'a' => [
                'href' => 'https://hwplabs.com/cpanel',
            ],
            'img' => [
                'src' => 'images/fab_cpanel.png',
                'alt' => '',
            ],
            'i' => '', // 'fas fa-server'
            'text' => 'cPanel',
        ],
    ],
];

// Ex. 'header_apps_keys' => ['fa' => 'i', 'a.text_alt' => 'text'],
if (isset($header_apps_keys)) {
    foreach ($header_apps_list as $i => $list) {
        $header_apps_list[$i] = $f::repl($list, $header_apps_keys);
    }
}
@endphp


<div class="dropdown d-none d-lg-inline-block ms-1">
    <button type="button" class="btn header-item noti-icon waves-effec" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false" title="{{ $header_apps_tooltip }}">
        <i class="fi fi-rs-apps ico override-fg"></i>
    </button>

    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
        <div class="px-lg-2">
            @foreach ($header_apps_list as $list)
                <div class="row g-0">
                    @foreach ($list as $item)
                        <div class="col">
                            <a class="dropdown-icon-item" href="{{ url($item['a']['href']) }}" target="_new">
                                @if (strlen($item['i']) > 0)
                                    <i class="{{ $item['i'] }}" style="font-size: 24px"></i>
                                @else
                                    <img src="{{ asset($item['img']['src']) }}" alt="{{ $item['img']['alt'] }}" />
                                @endif
                                <span>{{ $item['text'] }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
