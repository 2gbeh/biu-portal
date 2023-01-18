<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListProgramme;
use App\Models\ListSession;
use App\Models\MapSessionsToProgramme;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class MapSessionsToProgrammeController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

        $this->view = 'admin.map-sessions-to-programmes';
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Sessions <> Programmes', 'breadcrumb_base' => 'System Maps'];

        $rows = MapSessionsToProgramme::datable();
        $ddl_sessions = ListSession::ddl();
        $ddl_programmes = ListProgramme::ddl();

        $map_props = (object) [
            'form' => [[
                [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Sessions',
                    'name' => 'list_session_id',
                    'options' => $ddl_sessions,
                    'constraint' => 'required',
                ], [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Programmes',
                    'name' => 'list_programme_id',
                    'options' => $ddl_programmes,
                    'constraint' => 'required',
                ],
            ]],
            'thead' => ['#', 'Session', 'Programme', 'Date', 'Action'],
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
