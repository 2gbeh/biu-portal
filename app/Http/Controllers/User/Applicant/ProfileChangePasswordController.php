<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ChangePasswordController extends Controller
{
    use ControllerTrait;

    protected $view = 'admin.change-password';
    protected $base = 'My Profile';

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);
    }

    public function create()
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Change Password', 'breadcrumb_base' => $this->base];

        $rows = User::datable();

        $change_password_props = (object) [
            'toolbar' => (object) [
                'button' => ['href' => 'admin/profile', 'color' => 'success', 'icon' => 'fas fa-arrow-circle-left', 'text' => 'My Profile'],
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
