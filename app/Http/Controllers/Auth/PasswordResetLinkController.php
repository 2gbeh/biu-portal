<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Routing\Route;
use App\Events\SelectEvent;
use App\Events\UpdateEvent;
use App\Providers\RouteServiceProvider;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request, Route $route)
    {
        event(new SelectEvent([$request, $route]));

        return view(RouteServiceProvider::FORGOT_PASSWORD);
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        event(new UpdateEvent([$request, $route]));

        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
        ? back()->withErrors(['message' => __($status), 'status' => 200])
        : back()->withInput($request->only('email'))
            ->withErrors(['message' => __($status)]);
    }
}
