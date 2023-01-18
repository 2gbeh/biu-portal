<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListProgramme;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ListProgrammeController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'View Programmes', 'breadcrumb_base' => 'Systems'];

        $rows = ListProgramme::datable();

        $view_programmes_props = (object) [
            'thead' => ['#', 'Abbreviation', 'Programme', 'Action'],
            'tbody' => $rows,
        ];

        return view('admin.list-programmes')->with('data', (object)
            compact(
                'breadcrumb',
                'view_programmes_props',
            )
        );
    }
}
