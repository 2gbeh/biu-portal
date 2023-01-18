<?php

namespace App\Traits;

use App\Models\Course;
use App\Models\ListFaculty;
use App\Traits\RouteTrait;
use Illuminate\Http\Request;

trait AdminCourseControllerTrait
{
    public function courseIndex(Request $request)
    {
        $paginator = Course::paginate_();

        $pager = self::pager($request, $paginator);

        return (object) [
            'button' => ['href' => RouteTrait::create(), 'color' => 'success', 'icon' => 'fas fa-plus-circle', 'text' => 'Add New'],
            'input' => ['action' => 'courses.show', 'name' => 'slug', 'disabled' => 'disabled'],
            'thead' => [
                '#',
                'Course Title',
                'Course Code',
                'Credit Load',
                'Course Type',
                'Date',
                'Action',
            ],
            'pager' => $pager,
        ];
    }

    public function courseCreate()
    {
        $dl_courses = Course::dl('course_title');
        $dl_codes = Course::dl('course_code');
        $ddl_types = [null, 'Core', 'Mandatory', 'Compulsory', 'Elective'];
        $ddl_faculties = ListFaculty::ddl();

        return [
            'toolbar' => (object) [
                'button' => ['href' => RouteTrait::index(), 'color' => 'success', 'icon' => 'fas fa-arrow-circle-left', 'text' => 'View All'],
            ],
            'form' => [[
                [
                    'col' => 8,
                    'type' => 'search',
                    'label' => '*Course Title',
                    'name' => 'course_title',
                    'placeholder' => 'Ex. Data Structures & Algorithms',
                    'datalist' => $dl_courses,
                    'constraint' => 'required',
                ], [
                    'col' => 4,
                    'type' => 'search',
                    'label' => '*Course Code',
                    'name' => 'course_code',
                    'placeholder' => 'Ex. CS411',
                    'datalist' => $dl_codes,
                    'constraint' => 'required',
                ],
            ], [
                [
                    'col' => 4,
                    'type' => 'number',
                    'label' => '*Credit Load',
                    'name' => 'credit_load',
                    'min' => 1,
                    'max' => 3,
                    'constraint' => 'required',
                ], [
                    'col' => 4,
                    'type' => 'select',
                    'label' => '*Course Type',
                    'name' => 'course_type',
                    'options' => $ddl_types,
                    'constraint' => 'required',
                ], [
                    'col' => 4,
                    'type' => 'select',
                    'label' => 'Faculty',
                    'name' => 'faculty_id',
                    'options' => $ddl_faculties,
                ],
            ]]];
    }
}
