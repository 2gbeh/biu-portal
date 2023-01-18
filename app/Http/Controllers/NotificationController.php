<?php

namespace App\Http\Controllers;

use App\Notifications\LoginNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // php artisan make:controller NotificationController --invokable
        return Notification::send($request, new LoginNotification([
            'body' => $request->input('body'),
            'anchor' => [
                'text' => $request->input('anchor.text'),
                'href' => $request->input('anchor.href'),
            ],
            'salute' => $request->input('salute'),
        ]));
    }
}
