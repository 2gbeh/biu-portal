<?php

namespace App\Http\Controllers\Admin;

use App\Events\SelectEvent;
use App\Http\Controllers\Controller;
use App\Traits\AdminDashboardControllerTrait;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class DashboardController extends Controller
{
    use ControllerTrait, AdminDashboardControllerTrait;

    protected $view = 'admin.dashboard';

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

        $breadcrumb = ['breadcrumb_page' => 'Dashboard', 'breadcrumb_base' => 'Home'];

        $total_employees_props = $this->totalEmployees();

        $total_students_props = $this->totalStudents();

        $total_applicants_props = $this->totalApplicants();

        $total_transactions_props = $this->totalTransactions();

        $student_population_props = $this->studentPopulation();

        $systems_summary_props = $this->systemsSummary();

        $payment_logs_props = $this->paymentLogs();

        $activity_logs_props = $this->activityLogs();

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'total_employees_props',
                'total_students_props',
                'total_applicants_props',
                'total_transactions_props',
                'student_population_props',
                'systems_summary_props',
                'payment_logs_props',
                'activity_logs_props'
            )
        );
    }

}
    