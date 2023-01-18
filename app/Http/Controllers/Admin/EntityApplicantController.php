<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EntityApplicant;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class EntityApplicantController extends Controller
{
    use ControllerTrait;

    protected $view = 'admin.entity-applicants';

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'View Applicants', 'breadcrumb_base' => 'Admissions'];

        $rows = EntityApplicant::datable();

        $applicants_props = (object) [
            'thead' => ['#', 'Date', 'Applicant', 'Contact Info', 'Session', 'Programme', 'Course of Study', 'Status', 'Action'],
            'tbody' => $rows,
        ];

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'applicants_props',
            )
        );
    }
}
