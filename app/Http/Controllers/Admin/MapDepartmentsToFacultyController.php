<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListDepartment;
use App\Models\ListFaculty;
use App\Models\MapDepartmentsToFaculty;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class MapDepartmentsToFacultyController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

        $this->view = 'admin.map-departments-to-faculties';
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Departments <> Faculties', 'breadcrumb_base' => 'System Maps'];

        $rows = MapDepartmentsToFaculty::datable();
        $ddl_departments = ListDepartment::ddl();
        $ddl_faculties = ListFaculty::ddl();

        $map_props = (object) [
            'form' => [[
                [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Departments',
                    'name' => 'list_department_id',
                    'options' => $ddl_departments,
                    'constraint' => 'required',
                ], [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Faculties',
                    'name' => 'list_faculty_id',
                    'options' => $ddl_faculties,
                    'constraint' => 'required',
                ],
            ]],
            'thead' => ['#', 'Department', 'Faculty', 'Date', 'Action'],
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
