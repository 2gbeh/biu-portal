<?php

namespace App\Http\Controllers\User\Applicant;

use App\Events\SelectEvent;
use App\Http\Controllers\Controller;
use App\Traits\ControllerTrait;
use App\Traits\UserApplicantDashboardControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class DashboardController extends Controller
{
    use ControllerTrait, UserApplicantDashboardControllerTrait;

    protected $view = 'user.applicant.dashboard', $base = 'Home';

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Route $route)
    {
        //
        event(new SelectEvent([$request, $route]));

        $breadcrumb = ['breadcrumb_page' => 'Dashboard', 'breadcrumb_base' => $this->base];

        $dashboard_props = $this->availProgrammes();

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'dashboard_props',
            )
        );
    }

}
