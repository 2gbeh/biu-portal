<?php

namespace App\Http\Controllers\Admin;

use App\Events\SelectEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class SearchController extends Controller
{
    use ControllerTrait;
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

        $breadcrumb = ['breadcrumb_page' => 'Internal Search Console', 'breadcrumb_base' => 'P.R.I.S.M'];

        $emails = User::mock('email');

        $form_control_props = [[
            [
                'type' => 'search',
                'name' => 'slug',
                'value' => old('slug'),
                'placeholder' => 'Search by email or matric no.',
                'constraint' => 'required',
                'datalist' => $emails,
            ],
        ]];

        $top_search_props = User::mock(25);

        return view('admin.search')->with('data', (object)
            compact(
                'breadcrumb',
                'form_control_props',
                'top_search_props',
            )
        );
    }

}
