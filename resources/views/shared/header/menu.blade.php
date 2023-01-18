@php
$header_menu_tooltip = $header_menu_tooltip ?? 'Account';
$header_menu_avatar = $header_menu_avatar ?? 'images/avatar.png';

$header_menu_profile_url = $header_menu_profile_url ?? 'admin/profile';
$header_menu_logout_url = $header_menu_logout_url ?? 'admin/logout';
$header_menu_name = $header_menu_name ?? 'Mark';
$header_menu_list = $header_menu_list ?? [
    [
        'a' => ['href' => '#'],
        'i' => 'fas fa-bug',
        'text' => 'Tech Support',
    ],
    [
        'a' => ['href' => '#', 'target' => '_new'],
        'i' => 'fas fa-globe',
        'text' => 'Visit Website',
    ],
];

@endphp


<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effec" id="page-header-user-dropdown" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" title="{{ $header_menu_tooltip }}">

        <img class="rounded-circle header-profile-user" src="{{ asset($header_menu_avatar) }}" alt=""
            style="margin-right:5px; width:40px; height:40px; border:2px solid #fff;" />

        <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15 override-fg"
            style="position:relative;top:1px;">
            {{ $header_menu_name }}
        </span>
        &nbsp;
        <i class="fas fa-caret-down d-none d-xl-inline-block font-size-15 override-fg"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        <a class="dropdown-item" href="{{ url($header_menu_profile_url) }}">
            <i class="fas fa-user-circle font-size-18 align-middle text-muted me-1"></i>
            <span class="align-middle">My Profile</span>
        </a>

        @foreach ($header_menu_list as $item)
            <a class="dropdown-item" href="{{ url($item['a']['href']) }}" target="{{ $item['a']['target'] ?? '' }}">
                @if (isset($item['i']))
                    <i class="{{ $item['i'] }} font-size-18 align-middle text-muted me-1"></i>
                @endif
                <span class="align-middle">
                    {{ $item['text'] }}
                </span>
            </a>
        @endforeach

        <a class="dropdown-item" href="#!">
            <i class="fas fa-sign-out-alt font-size-18 align-middle me-1 text-muted"></i>
            <span class="align-middle">
                @includeIf('shared.button.sign-out', ['button_sign_out_action' => $header_menu_logout_url])
            </span>
        </a>
    </div>
</div>
