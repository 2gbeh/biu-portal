<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListProgramme;
use App\Models\ListUnit;
use App\Models\MapUnitsToProgramme;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class MapUnitsToProgrammeController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

        $this->view = 'admin.map-units-to-programmes';
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Units <> Programmes', 'breadcrumb_base' => 'System Maps'];

        $rows = MapUnitsToProgramme::datable();
        $dl_degrees = MapUnitsToProgramme::dl('degree');
        $ddl_units = ListUnit::ddl();
        $ddl_programmes = ListProgramme::ddl();

        $map_props = (object) [
            'form' => [[
                [
                    'col' => 4,
                    'type' => 'search',
                    'label' => '*Degree',
                    'name' => 'degree',
                    'placeholder' => 'Ex. B.Sc./M.Sc./Ph.d. etc',
                    'datalist' => $dl_degrees,
                    'constraint' => 'required',
                ], [
                    'col' => 4,
                    'type' => 'select',
                    'label' => '*Units',
                    'name' => 'list_unit_id',
                    'options' => $ddl_units,
                    'constraint' => 'required',
                ], [
                    'col' => 4,
                    'type' => 'select',
                    'label' => '*Programmes',
                    'name' => 'list_programme_id',
                    'options' => $ddl_programmes,
                    'constraint' => 'required',
                ],
            ]],
            'thead' => ['#', 'Degree', 'Unit', 'Programme', 'Date', 'Action'],
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
