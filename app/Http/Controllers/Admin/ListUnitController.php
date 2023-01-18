<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListUnit;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ListUnitController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'View Units', 'breadcrumb_base' => 'Systems'];

        $rows = ListUnit::datable();

        $view_units_props = (object) [
            'thead' => ['#', 'Unit', 'Action'],
            'tbody' => $rows,
        ];

        return view('admin.list-units')->with('data', (object)
            compact(
                'breadcrumb',
                'view_units_props',
            )
        );
    }
}
