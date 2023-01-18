<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRole;
use App\Models\User;
use App\Models\PrivilegeRole;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UserRoleController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

        $this->view = 'admin.user-roles';
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'User Roles', 'breadcrumb_base' => 'Accounts'];

        $rows = UserRole::datable();
        $ddl_users = User::ddl('name');
        $ddl_roles = PrivilegeRole::ddl('role');


        $user_role_props = (object) [
            'form' => [[
                [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*User Account',
                    'name' => 'user_id',
                    'options' => $ddl_users,
                    'constraint' => 'required',
                ], [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Assign Role',
                    'name' => 'privilege_role_id',
                    'options' => $ddl_roles,
                    'constraint' => 'required',
                ],
            ]],
            'thead' => ['#', 'User Account', 'Assigned Role', 'Date', 'Action'],
            'tbody' => $rows,
        ];

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'user_role_props',
            )
        );
    }
}
