@php
$header_lang_tooltip = $header_lang_tooltip ?? 'Language';
$header_lang_list = $header_lang_list ?? [
    [
        'img' => ['src' => 'images/flag_nga.png', 'alt' => 'NGA'],
        'text' => 'Nigeria',
        'sup' => 'EN',
    ],
];

// dd($header_lang_list);

@endphp


<div class="dropdown d-inline-block language-switch" style="position:relative; top:-2px;">
    @if (count($header_lang_list) == 1)
        <button type="button" class="btn header-item waves-effec" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" title="{{ $header_lang_tooltip }}">
            <img src="{{ asset($header_lang_list[0]['img']['src']) }}" alt="{{ $header_lang_list[0]['img']['alt'] }}"
                height="16" class="override-fg">
            <span class="override-fg" style="margin-left:3px; font-size:12px;">{{ $header_lang_list[0]['sup'] }}</span>
        </button>
    @else
        <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" title="Lang">
            <img src="{{ asset($header_lang_list[0]['img']['src']) }}" alt="{{ $header_lang_list[0]['img']['alt'] }}"
                height="16" class="override-fg">
            <sup class="override-fg" style="margin-left:3px; font-size:10px;">{{ $header_lang_list[0]['sup'] }}</sup>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            @foreach ($header_lang_list as $item)
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="{{ asset($item['img']) }}" alt="user-image" class="me-1" height="12">
                    <span class="align-middle">{{ $item['text'] }}</span>
                </a>
            @endforeach
        </div>
    @endif
</div>
