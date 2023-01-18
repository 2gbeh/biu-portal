<?php

namespace App\Http\Controllers\User\Applicant;

use App\Http\Controllers\Controller;
use App\Traits\ControllerTrait;
use App\Traits\UserApplicantApplyControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

// use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    use ControllerTrait, UserApplicantApplyControllerTrait;

    protected $view = 'user.applicant.apply', $base = 'Home';

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

        $this->user_id = 6;

        // $this->user_id = auth()->user()->id;
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Admission Form', 'breadcrumb_base' => $this->base];

        $nav_tabs_props = $this->navTabs();

        $tab_pane_bio_props = $this->tabPaneBio($this->user_id);

        $tab_pane_nok_props = $this->tabPaneNok($this->user_id);

        $tab_pane_sponsor_props = $this->tabPaneSponsor($this->user_id);

        $tab_pane_jamb_props = $this->tabPaneJamb($this->user_id);

        $tab_pane_exams_props = $this->tabPaneExams($request, $this->user_id);

        $tab_pane_course_props = $this->tabPaneCourse($this->user_id);

        $appendix_props = $this->appendix($this->user_id);

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'nav_tabs_props',
                'tab_pane_bio_props',
                'tab_pane_nok_props',
                'tab_pane_sponsor_props',
                'tab_pane_jamb_props',
                'tab_pane_exams_props',
                'tab_pane_course_props',
                'appendix_props',
            )
        );
    }

}
