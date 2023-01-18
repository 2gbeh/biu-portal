@inject('guestContent', 'App\Services\GuestContentService')

@extends('layouts.guest.content')

@section('page', 'Change Password')

@section('content')
    <x-form.guest action="password.update">
        <label class="block text-sm">
            <span class="{{ trans('tw.label') }}">Email</span>
            <input type="email" name="email" value="{{ old('email') }}" class="{{ trans('tw.input') }}"
                placeholder="example@biu.edu.ng" required />
        </label>
        <label class="block text-sm fi-group">
            <span class="{{ trans('tw.label') }}">Password</span>
            <input type="password" name="password" id="password" value="{{ old('password') }}"
                class="{{ trans('tw.input') }}" placeholder="**** ****" required />
            <i class="fi fi-rs-eye" id="spy" title="Show"></i>

        </label>
        <label class="block text-sm">
            <span class="{{ trans('tw.label') }}">Confirm Password</span>
            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                class="{{ trans('tw.input') }}" placeholder="**** ****" required />

        </label>

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        @includeIf('shared.button.sign-in', $guestContent->authResetPasswordProps())
    </x-form.guest>

    <p class="mt-4 nav-links">
        <a class="{{ trans('tw.nav-link') }}" href="{{ url('admin/forgot-password') }}">
            Return to previous page
        </a>
    </p>
@endsection
