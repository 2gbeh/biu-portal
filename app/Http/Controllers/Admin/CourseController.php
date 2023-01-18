<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\AdminCourseControllerTrait;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class CourseController extends Controller
{
    use ControllerTrait, AdminCourseControllerTrait;

    protected $view = 'admin.courses', $base = 'Courses';

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

    }
    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Manage Courses', 'breadcrumb_base' => $this->base];

        $manage_courses_props = $this->courseIndex($request);

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'manage_courses_props',
            )
        );
    }

    public function create()
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Create Course', 'breadcrumb_base' => $this->base];

        $create_course_props = $this->courseCreate();

        return view("{$this->view}-create")->with('data', (object)
            compact(
                'breadcrumb',
                'create_course_props',
            )
        );
    }
}
