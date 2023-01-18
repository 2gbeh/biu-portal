<?php

namespace App\Http\Controllers;

use App\Events\SelectEvent;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class WelcomeController extends Controller
{
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

        $apps = config('context.apps');

        $social = config('context.social');

        return view('welcome')->with('data', (object)
            compact('apps', 'social')
        );

    }
}
