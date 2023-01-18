<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivilegeRole;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PrivilegeRoleController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'View Roles', 'breadcrumb_base' => 'Privileges'];

        $rows = PrivilegeRole::datable();

        $view_roles_props = (object) [
            'thead' => ['#', 'Role / Assigned To', 'Date', 'Action'],
            'tbody' => $rows,
        ];

        return view('admin.privilege-roles')->with('data', (object)
            compact(
                'breadcrumb',
                'view_roles_props',
            )
        );
    }
}
