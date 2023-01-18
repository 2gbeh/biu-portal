<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListFaculty;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ListFacultyController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'View Faculties', 'breadcrumb_base' => 'Systems'];

        $rows = ListFaculty::datable();

        $view_faculties_props = (object) [
            'thead' => ['#', 'Abbreviation', 'Faculty', 'Action'],
            'tbody' => $rows,
        ];

        return view('admin.list-faculties')->with('data', (object)
            compact(
                'breadcrumb',
                'view_faculties_props',
            )
        );
    }
}
