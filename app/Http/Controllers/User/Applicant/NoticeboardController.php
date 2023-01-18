<?php

namespace App\Http\Controllers\User\Applicant;

use App\Http\Controllers\Controller;
use App\Traits\ControllerTrait;
use App\Traits\UserApplicantNoticeboardControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class NoticeboardController extends Controller
{
    use ControllerTrait, UserApplicantNoticeboardControllerTrait;

    protected $view = 'user.applicant.noticeboard', $base = 'Noticeboard';

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'My Notifications', 'breadcrumb_base' => $this->base];

        $noticeboard_props = $this->noticeboardIndex($request);

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'noticeboard_props',
            )
        );
    }

    public function show(int $id)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'View Notification', 'breadcrumb_base' => $this->base];

        $noticeboard_props = $this->noticeboardShow($id);

        return view("{$this->view}-show")->with('data', (object)
            compact(
                'breadcrumb',
                'noticeboard_props',
            )
        );
    }
}
