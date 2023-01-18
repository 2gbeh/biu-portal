<?php

namespace App\Http\Controllers\Admin;

use App\Events\SelectEvent;
use App\Http\Controllers\Controller;
use App\Traits\AdminHelpControllerTrait;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class HelpController extends Controller
{
    use ControllerTrait, AdminHelpControllerTrait;

    protected $view = 'admin.help';
    protected $base = 'Home';

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

        $breadcrumb = ['breadcrumb_page' => 'Help Center', 'breadcrumb_base' => $this->base];

        $title_card_props = $this->titleCard();

        $contact_us_props = $this->contactUs();

        $about_us_props = $this->aboutUs();

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'title_card_props',
                'contact_us_props',
                'about_us_props',
            )
        );
    }

}
