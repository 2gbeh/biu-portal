<?php

namespace App\Http\Controllers\Auth;

use App\Events\SelectEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserRole;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function __construct()
    {
        abort(401);
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request, Route $route)
    {
        event(new SelectEvent([$request, $route]));

        return view(RouteServiceProvider::REGISTER);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Route $route)
    {
        $request->validate([
            'auth' => Rule::in(config('context.tenants')),
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'auth' => $request->auth,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'uuid' => User::uuid(),
        ]);

        $names = explode(' ', $request->name);
        $userProfile = UserProfile::create([
            'user_id' => $user->id,
            'surname' => $names[0],
            'first_name' => $names[1] ?? $names[0],
            'middle_name' => $names[2] ?? null,
            'email' => $request->email,
        ]);

        $userRole = UserRole::create([
            'user_id' => $user->id,
            'privilege_role_id' => 2, // super admin
        ]);

        event(new Registered($user));

        Auth::login($user);

        User::watch($request, $route);

        return redirect(RouteServiceProvider::HOME);
    }
}
