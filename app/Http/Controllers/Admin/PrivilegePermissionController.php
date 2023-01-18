<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivilegePermission;
use App\Models\PrivilegeRole;
use App\Models\PrivilegeGate;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PrivilegePermissionController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

        $this->view = 'admin.privilege-permissions';
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Assign Permissions', 'breadcrumb_base' => 'Privileges'];

        $rows = PrivilegePermission::datable();
        $ddl_role = PrivilegeRole::ddl('role');
        $ddl_gate = PrivilegeGate::ddl('gate');

        $view_permissions_props = (object) [
            'form' => [[
                [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*User Role',
                    'name' => 'privilege_role_id',
                    'options' => $ddl_role,
                    'constraint' => 'required',
                ], [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Menu Item',
                    'name' => 'privilege_gate_id',
                    'options' => $ddl_gate,
                    'constraint' => 'required',
                ],
            ]],
            'thead' => ['#', 'User Role', 'Menu Item', 'Date', 'Action'],
            'tbody' => $rows,
        ];

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'view_permissions_props',
            )
        );
    }
}
