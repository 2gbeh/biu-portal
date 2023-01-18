<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListSession;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ListSessionController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'View Sessions', 'breadcrumb_base' => 'Systems'];

        $rows = ListSession::datable();

        $view_sessions_props = (object) [
            'thead' => ['#', 'Session', 'Action'],
            'tbody' => $rows,
        ];

        return view('admin.list-sessions')->with('data', (object)
            compact(
                'breadcrumb',
                'view_sessions_props',
            )
        );
    }
}
