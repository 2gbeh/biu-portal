<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivilegePolicy;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PrivilegePolicyController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'View Policies', 'breadcrumb_base' => 'Privileges'];

        $rows = PrivilegePolicy::datable();

        $view_policies_props = (object) [
            'thead' => ['#', 'Policy', 'Icon', 'Date', 'Action'],
            'tbody' => $rows,
        ];

        return view('admin.privilege-policies')->with('data', (object)
            compact(
                'breadcrumb',
                'view_policies_props',
            )
        );
    }
}
