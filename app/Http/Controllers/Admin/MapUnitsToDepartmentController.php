<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListDepartment;
use App\Models\ListUnit;
use App\Models\MapUnitsToDepartment;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class MapUnitsToDepartmentController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

        $this->view = 'admin.map-units-to-departments';
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Units <> Departments', 'breadcrumb_base' => 'System Maps'];

        $rows = MapUnitsToDepartment::datable();
        $ddl_units = ListUnit::ddl();
        $ddl_departments = ListDepartment::ddl();

        $map_props = (object) [
            'form' => [[
                [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Units',
                    'name' => 'list_unit_id',
                    'options' => $ddl_units,
                    'constraint' => 'required',
                ], [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Departments',
                    'name' => 'list_department_id',
                    'options' => $ddl_departments,
                    'constraint' => 'required',
                ],
            ]],
            'thead' => ['#', 'Unit', 'Department', 'Date', 'Action'],
            'tbody' => $rows,
        ];

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'map_props',
            )
        );
    }
}
