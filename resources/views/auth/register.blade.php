@inject('guestContent', 'App\Services\GuestContentService')

@extends('layouts.guest.content')

@section('page', 'Register')

@section('content')
    <x-form.guest action="register.store">
        <label class="block text-sm">
            <span class="{{ trans('tw.label') }}">Name or username</span>
            <input type="search" name="name" value="{{ old('name') }}" class="{{ trans('tw.input') }}"
                placeholder="N/b: Surname first" required />
        </label>

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

        <input type="hidden" name="auth" value="STAFF" />

        @includeIf('shared.button.sign-in', $guestContent->authRegisterProps())
    </x-form.guest>


    <p class="mt-4 nav-links">
        <a class="{{ trans('tw.nav-link') }}" href="{{ url('admin/login') }}">
            Already have an account? Sign in
        </a>
    </p>

@endsection
