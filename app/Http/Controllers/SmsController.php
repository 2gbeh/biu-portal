<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // php artisan make:controller SmsController --invokable
        return Nexmo::message()->send([
            'to' => $request->input('to') ?? '2348169960927',
            'from' => $request->input('from') ?? 'Laravel via Nexmo',
            'text' =>  $request->input('text')?? 'Hello from Vonage SMS API'
        ]);
    }
}
