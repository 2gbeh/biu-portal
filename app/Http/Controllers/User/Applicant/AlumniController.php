<?php

namespace App\Http\Controllers\User\Applicant;

use App\Events\SelectEvent;
use App\Http\Controllers\Controller;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class AlumniController extends Controller
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

        $breadcrumb = ['breadcrumb_page' => 'BIU Alumni', 'breadcrumb_base' => 'Home'];

        $alumni_props = [
            [
                'photo' => 'sokotete.png',
                'name' => 'Stella Okotete',
                'title' => 'Executive Director, Business Development, Nigeria Export-Import (NEXIM) Bank',
                'links' => [
                    [
                        'href' => '#!',
                        'icon' => 'fi fi-rs-physics',
                        'text' => 'Business Administration',
                    ],
                    [
                        'href' => '#!',
                        'icon' => 'fi fi-rs-rocket',
                        'text' => mt_rand(2002,2010),
                    ],
                ],
            ],
            [
                'photo' => 'jobidi.png',
                'name' => 'John Obidi',
                'title' => 'CEO, Editor in Chief, Headstart Africa, New Media Strategist',
                'links' => [
                    [
                        'href' => '#!',
                        'icon' => 'fi fi-rs-physics',
                        'text' => 'Computer Science',
                    ],
                    [
         -               'href' => '#!',
                        'icon' => 'fi fi-rs-rocket',
                        'text' => mt_rand(2002,2010),
                    ],
                ],
            ],
            [
                'photo' => 'bchukwujeku.png',
                'name' => 'Blossom Chukwujeku',
                'title' => 'Award Winning Nollywood Actor',
                'links' => [
                    [
                        'href' => '#!',
                        'icon' => 'fi fi-rs-physics',
                        'text' => 'Mass Communication',
                    ],
                    [
                        'href' => '#!',
                        'icon' => 'fi fi-rs-rocket',
                        'text' => mt_rand(2002,2010),
                    ],
                ],
            ],
            [
                'photo' => 'udare.png',
                'name' => 'Ukinebo Dare',
                'title' => 'CEO, Poise Graduate Finishing Academy, Senior Special Adviser to the Edo State Governor',
                'links' => [
                    [
                        'href' => '#!',
                        'icon' => 'fi fi-rs-physics',
                        'text' => 'Political Science',
                    ],
                    [
                        'href' => '#!',
                        'icon' => 'fi fi-rs-rocket',
                        'text' => mt_rand(2002,2010),
                    ],
                ],
            ],
        ];

        return view('user.applicant.alumni')->with('data', (object)
            compact(
                'breadcrumb',
                'alumni_props',
            )
        );
    }

}
