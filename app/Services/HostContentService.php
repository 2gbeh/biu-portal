<?php

namespace App\Services;

use App\Models\Noticeboard;
use App\Traits\RouteTrait;
use ContextHelper;
use Illuminate\Support\Facades\Auth;

class HostContentService
{
    public function chatbotProps()
    {
        return [];
    }

    public function navProps()
    {

        $nav_props = false ? session('MENU') : Auth::user()->userRolesView();

        if (RouteTrait::isStaff()) {
            $text = '<abbr title="Internal Search Console">P.R.I.S.M</abbr> &trade;';
            $nav_props[$text] = [
                "a" => ['href' => 'admin/search', 'target' => '_new'],
                "b" => ['color' => 'success', 'text' => 'new'],
                "i" => "fi fi-rs-search",
                "dt" => $text,
                "dd" => [],
            ];
        }

        if (RouteTrait::isApplicant()) {
            $text = 'BIU Alumni';
            $nav_props[$text] = [
                "a" => ['href' => 'user/applicant/alumni', 'target' => '_new'],
                "b" => ['color' => 'success', 'text' => 'new'],
                "i" => "fi fi-rs-graduation-cap",
                "dt" => $text,
                "dd" => [],
            ];
        }

        return [
            'nav_list' => $nav_props,
            'nav_icon' => ContextHelper::get('theme.gold'),
        ];
    }

    public function headerProps()
    {
        return [
            'header_bg' => ContextHelper::get('theme.blue'),
            'header_fg' => '#fff',
        ];
    }

    public function headerAppsProps()
    {
        $apps = ContextHelper::get('apps');
        $apps_ = [];

        while (count($apps) > 0) {
            $apps_[] = array_slice($apps, 0, 3);
            $apps = array_slice($apps, 3);
        }

        return [
            'header_apps_list' => $apps_,
            'header_apps_keys' => ['fa' => 'i', 'a.text_alt' => 'text'],
        ];
    }

    public function headerMenuProps()
    {
        $name = session('WHO');
        $avatar = Auth::user()->photo;
        $profile_url = RouteTrait::isTenant('user/applicant/profile', 'user/student/profile', 'admin/profile');
        $logout_url = RouteTrait::isTenant('user/applicant/logout', 'user/student/logout', 'admin/logout');
        $help_url = RouteTrait::isTenant('user/applicant/help', 'user/student/help', 'admin/help');

        return [
            'header_menu_avatar' => $avatar,
            'header_menu_profile_url' => $profile_url,
            'header_menu_logout_url' => $logout_url,
            'header_menu_name' => $name,
            'header_menu_list' => [
                [
                    'a' => ['href' => $help_url],
                    'i' => 'fas fa-exclamation-triangle',
                    'text' => 'Help Center',
                ],
                [
                    'a' => ['href' => '/'],
                    'i' => 'fas fa-globe',
                    'text' => 'Visit Website',
                ],
            ],
        ];
    }

    public function headerNotificationsProps()
    {
        $noticeboard = Noticeboard::limit__();
        $notifications_url = RouteTrait::isTenant('user/applicant/noticeboard', 'user/student/noticeboard', 'admin/noticeboard');

        return [
            'header_notifications_title' => 'Noticeboard',
            'header_notifications_url' => $notifications_url,
            'header_notifications_list' => $noticeboard,
        ];
    }

    public function footerProps()
    {
        return [
            'footer_lt' => ContextHelper::get('copyright'),
            'footer_rt' => ContextHelper::get('powered_by'),
        ];
    }
}
