<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ControllerTrait;
use App\Traits\RouteTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ProfileChangePasswordController extends Controller
{
    use ControllerTrait;

    protected $view = 'profile-change-password', $base = 'My Profile';

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);
        
        $this->profile_url = RouteTrait::isTenant('user/applicant/profile', 'user/student/profile', 'admin/profile');
    }

    public function create()
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Change Password', 'breadcrumb_base' => $this->base];

        $rows = User::datable();

        $change_password_props = (object) [
            'toolbar' => (object) [
                'button' => ['href' => $this->profile_url, 'color' => 'success', 'icon' => 'fas fa-arrow-circle-left', 'text' => 'My Profile'],
            ],
            'form' => [[
                [
                    'label' => '*Current Password',
                    'name' => 'password',
                    'constraint' => 'required',
                ],
            ], [
                [
                    'col' => 6,
                    'label' => '*New Password',
                    'name' => 'password_new',
                    'constraint' => 'required',
                ], [
                    'col' => 6,
                    'label' => '*Confirm New Password',
                    'name' => 'password_cfm',
                    'constraint' => 'required',
                ],
            ],
            ]];

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'change_password_props',
            )
        );
    }
}
