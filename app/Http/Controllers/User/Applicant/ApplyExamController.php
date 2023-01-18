<?php

namespace App\Http\Controllers\User\Applicant;

use App\Http\Controllers\Controller;
use App\Models\EntityApplicantExam;
use App\Models\ListExam;
use App\Models\ListSubject;
use App\Models\ListGrade;
use App\Traits\ControllerTrait;
use App\Traits\RouteTrait;
use Illuminate\Http\Request;
use EnumHelper as k;
use Illuminate\Routing\Route;

// use Illuminate\Support\Facades\Auth;

class ApplyExamController extends Controller
{
    use ControllerTrait;

    protected $view = 'user.applicant.apply-exam', $base = 'My Admission';

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);
    }

    public function create()
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Add Exam', 'breadcrumb_base' => $this->base];

        $dl_exam_center = EntityApplicantExam::dl('exam_center');

        $add_exam_props = (object) [
            'toolbar' => (object) [
                'button' => ['href' => RouteTrait::rmv('-exam/create'), 'color' => 'success', 'icon' => 'fas fa-arrow-circle-left', 'text' => 'O-Level Exams'],
            ],
            'form' => [[
                [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Exam Title',
                    'name' => 'list_exam_id',
                    'options' => ListExam::ddl(),
                    'constraint' => 'required',
                ],
                [
                    'col' => 6,
                    'label' => '*Exam Number',
                    'name' => 'exam_no',
                    'placeholder' => 'Candidate Number',
                    'constraint' => 'required',
                ],
            ], [
                [
                    'col' => 4,
                    'type' => 'datalist',
                    'label' => 'Exam Centre',
                    'name' => 'exam_center',
                    'datalist' => $dl_exam_center,

                ],
                [
                    'col' => 4,
                    'type' => 'select',
                    'label' => '*Exam Month',
                    'name' => 'exam_month',
                    'options' => k::ddlNoKey('MONTH_'),
                    'constraint' => 'required',
                ],
                [
                    'col' => 4,
                    'type' => 'number',
                    'label' => '*Exam Year',
                    'name' => 'exam_year',
                    'value' => 1970,
                    'min' => 1970,
                    'max' => date('Y'),
                    'constraint' => 'required',
                ],
            ], [
                [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Subject',
                    'name' => 'list_subject_id',
                    'options' => ListSubject::ddl(),
                    'constraint' => 'required',
                ], [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Grade / Score',
                    'name' => 'list_grade_id',
                    'options' => ListGrade::ddl(),
                    'constraint' => 'required',
                ],
            ],
            ]];

        return view("{$this->view}-create")->with('data', (object)
            compact(
                'breadcrumb',
                'add_exam_props',
            )
        );
    }

}
