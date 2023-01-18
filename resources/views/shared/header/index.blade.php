@php
$header_bg = $header_bg ?? '#0093dd';
$header_fg = $header_fg ?? '#fff';
@endphp

<style type="text/css">
    #page-topbar .override-bg {
        background-color: {{ $header_bg }};
    }

    #page-topbar .override-fg {
        color: {{ $header_fg . '!important' }};
    }

    #page-topbar .ico {
        position: relative;
        top: 3px;
        font-size: 18px;
    }
</style>

<header id="page-topbar">
    <div class="navbar-header override-bg">
        <div class="d-flex">
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fas fa-fw fa-bars override-fg"></i>
            </button>
        </div>

        <div class="d-flex">
            @includeIf('shared.header.languages')

            @includeIf('shared.header.apps', $hostContent->headerAppsProps())

            @includeIf('shared.header.notifications', $hostContent->headerNotificationsProps())

            @includeIf('shared.header.menu', $hostContent->headerMenuProps())

            <div class="dropdown d-inline-block d-none">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="uil-cog"></i>
                </button>
            </div>
        </div>
    </div>
</header>
