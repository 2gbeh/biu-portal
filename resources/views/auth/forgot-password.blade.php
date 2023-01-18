@inject('guestContent', 'App\Services\GuestContentService')

@extends('layouts.guest.content')

@section('page', 'Reset Password')

@section('content')
    <x-form.guest action="password.email">
        <label class="block text-sm">
            <span class="{{ trans('tw.label') }}">Email address</span>
            <input type="email" name="email" value="{{ old('email') }}" class="{{ trans('tw.input') }}"
                placeholder="example@biu.edu.ng" required />
        </label>

        @includeIf('shared.button.sign-in', $guestContent->authForgotPasswordProps())

    </x-form.guest>

    <p class="mt-4 nav-links">
        <a class="{{ trans('tw.nav-link') }}" href="{{ url('admin/login') }}">
            Return to previous page
        </a>
    </p>

@endsection
