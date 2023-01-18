<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserLog;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UserLogController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

        $this->view = 'admin.user-logs';
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Activity Logs', 'breadcrumb_base' => 'Webmaster'];

        $paginator = UserLog::paginate_();

        $pager = self::pager($request, $paginator);

        $activity_log_props = (object) [
            'button' => ['href' => '?', 'color' => 'primary', 'icon' => 'fas fa-sync-alt', 'text' => 'Refresh'],
            'input' => ['action' => 'logs.show', 'name' => 'slug', 'disabled' => 'disabled'],
            'thead' => ['#', 'Date', 'Account', 'IP Address', 'Request', 'Route', 'Method', 'CRUD', 'Platform / OS'],
            'pager' => $pager,
        ];

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'activity_log_props',
            )
        );
    }
}
