<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivilegeGate;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PrivilegeGateController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'View Gates', 'breadcrumb_base' => 'Privileges'];

        $rows = PrivilegeGate::datable();

        $view_gates_props = (object) [
            'thead' => ['#', 'Gate', 'Route', 'Icon', 'Badge', 'Date', 'Action'],
            'tbody' => $rows,
        ];

        return view('admin.privilege-gates')->with('data', (object)
            compact(
                'breadcrumb',
                'view_gates_props',
            )
        );
    }
}
