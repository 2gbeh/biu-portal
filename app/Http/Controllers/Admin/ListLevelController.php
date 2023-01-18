<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListLevel;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ListLevelController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'View Levels', 'breadcrumb_base' => 'Systems'];

        $rows = ListLevel::datable();

        $view_levels_props = (object) [
            'thead' => ['#', 'Level', 'Position', 'Action'],
            'tbody' => $rows,
        ];

        return view('admin.list-levels')->with('data', (object)
            compact(
                'breadcrumb',
                'view_levels_props',
            )
        );
    }
}
