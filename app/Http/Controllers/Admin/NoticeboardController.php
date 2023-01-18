<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\AdminNoticeboardControllerTrait;
use App\Traits\ControllerTrait;
use App\Models\Noticeboard;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class NoticeboardController extends Controller
{
    use ControllerTrait, AdminNoticeboardControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

        $this->view = 'admin.noticeboard';
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'View Notifications', 'breadcrumb_base' => 'Noticeboard'];

        $noticeboard_index_props = $this->noticeboardIndex($request);

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'noticeboard_index_props',
            )
        );
    }

    public function create()
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Send Notification', 'breadcrumb_base' => 'Noticeboard'];

        $noticeboard_create_props = $this->noticeboardCreate();

        return view("{$this->view}-create")->with('data', (object)
            compact(
                'breadcrumb',
                'noticeboard_create_props',
            )
        );
    }

    public function show(int $id)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'View Notification', 'breadcrumb_base' => 'Noticeboard'];

        $noticeboard_props = $this->noticeboardShow($id);

        return view("{$this->view}-show")->with('data', (object)
            compact(
                'breadcrumb',
                'noticeboard_props',
            )
        );
    }
}
