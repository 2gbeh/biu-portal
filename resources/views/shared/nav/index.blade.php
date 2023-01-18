@php
$nav_icon = $nav_icon ?? 'inherit';
$nav_list = $nav_list ?? [
    [
        'a' => ['href' => 'admin/dashboard', 'target' => ''],
        'b' => ['color' => 'success', 'text' => 'new'],
        'i' => 'fas fa-tachometer-alt',
        'dt' => 'Dashboard',
        'dd' => [],
    ],
    [
        'a' => [],
        'b' => [],
        'i' => 'fas fa-user-friends',
        'dt' => 'Accounts',
        'dd' => [
            [
                'a' => ['href' => 'admin/create', 'target' => ''],
                'b' => [],
                'i' => 'fas fa-user-plus',
                'dt' => 'Add New',
                'dd' => [],
            ],
            [
                'a' => ['href' => 'admin', 'target' => ''],
                'b' => ['color' => 'danger', 'text' => 15],
                'i' => 'fas fa-tasks',
                'dt' => 'Manage',
                'dd' => [],
            ],
        ],
    ],
];
@endphp

<style type="text/css">
    .vertical-menu .fas,
    .vertical-menu .fi {
        position: relative;
        top: 2px;
        color: {{ $nav_icon . '!important' }};
    }
</style>

<div class="vertical-menu">
    <div class="navbar-brand-box">
        <a href="" title="Reload" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('images/logo.png') }}" alt="" style="width:42px; margin-left:-10px;" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('images/typeface.png') }}" alt="" style="width:175px;" />
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effec vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title ">Menu</li>
                @foreach ($nav_list as $item)
                    @if (count($item['dd']) > 0)
                        @includeIf('shared.nav.group', ['nav_group' => $item])
                    @else
                        @includeIf('shared.nav.item', ['nav_item' => $item])
                    @endif
                @endforeach
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
