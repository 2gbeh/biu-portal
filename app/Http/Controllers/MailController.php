<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Handle email notification business logic.
     *
     * @return \Illuminate\Http\Response
     */

    public function __invoke(Request $request)
    {
        // php artisan make:controller MailController --invokable
        return Mail::send(new RegisterMail($request));
    }

}
