<?php

namespace App\Http\Controllers\User\Student;

use App\Events\SelectEvent;
use App\Http\Controllers\Controller;
use App\Traits\ControllerTrait;
use App\Traits\UserApplicantDashboardControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class DashboardController extends Controller
{
    use ControllerTrait, UserApplicantDashboardControllerTrait;
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

        $text_f = function ($t) {
            return "<span style=\"text-transform:uppercase; letter-spacing:1px;\">{$t}</span>";
        };
        $price_f = '<h2>&#8358; 10,500<h2>';
        $link_f = ['href' => '#!', 'text' => $text_f('apply now')];

        $dashboard_props = (object) [
            'title' => 'Our Available Programmes',
            'summary' => 'Candidates who did not choose Benson Idahosa University in their UTME may also apply. <br />
                    We provide a regularization process, to change candidates 1st choice to Benson Idahosa University,
                    <b style="display:inline-block;">at no additional cost</b>.',
            'cards' => [
                [
                    [
                        'title' => $text_f('undergraduate'),
                        'subtitle' => $text_f('full-time'),
                        'icon' => 'fi fi-rs-diamond',
                        'list' => [
                            'Session' => '2022/2023',
                            'Programmes' => 25,
                            'Applicants' => '001',
                            'Closing Date' => 'Sep 15, 2022',
                        ],
                        'price' => $price_f,
                        'link' => $link_f,
                    ], [
                        'title' => $text_f('undergraduate'),
                        'subtitle' => $text_f('part-time'),
                        'icon' => 'fi fi-rs-fox',
                        'list' => [
                            'Session' => '2022/2023',
                            'Programmes' => 25,
                            'Applicants' => '000',
                            'Closing Date' => 'Sep 15, 2022',
                        ],
                        'price' => $price_f,
                        'link' => $link_f,
                    ], [
                        'title' => $text_f('postgraduate'),
                        'subtitle' => $text_f('full-time'),
                        'icon' => 'fi fi-rs-rocket',
                        'list' => [
                            'Session' => '2022/2023',
                            'Programmes' => 25,
                            'Applicants' => '000',
                            'Closing Date' => 'Sep 15, 2022',
                        ],
                        'price' => $price_f,
                        'link' => $link_f,
                    ],
                ],
            ],
        ];

        return view('user.student.dashboard')->with('data', (object)
            compact(
                'breadcrumb',
                'dashboard_props',
            )
        );
    }

}
