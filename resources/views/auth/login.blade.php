@inject('guestContent', 'App\Services\GuestContentService')

@extends('layouts.guest.content')

@section('page', 'Log in')

@section('content')

    <script type="text/javascript">
        const handleAutofill = () => {
            $('#email').val('webmaster@test.com');
            $('#password').val('password');
            $('#remember').prop('checked', true);
        };
    </script>

    <x-form.guest action="admin/login">
        <label class="block text-sm">
            <span class="{{ trans('tw.label') }}">Email or username</span>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="{{ trans('tw.input') }}"
                placeholder="example@biu.edu.ng" required />
        </label>

        <label class="block text-sm fi-group">
            <span class="{{ trans('tw.label') }}">Password</span>
            <input type="password" id="password" name="password" id="password" value="{{ old('password') }}"
                class="{{ trans('tw.input') }}" placeholder="**** ****" required ondblclick="handleAutofill()" />
            <i class="fi fi-rs-eye" id="spy" title="Show"></i>
        </label>

        <div class="flex mt-1 text-sm">
            <label class="flex items-center">
                <input type="checkbox" id="remember" name="remember"
                    @if (old('remember') == 'on') checked="checked" @endif class="{{ trans('tw.null') }}" />

                {{-- <input type="checkbox" name="remember" checked="checked" class="{{ trans('tw.null') }}" /> --}}

                <span class="ml-2 text-gray-600">
                    Keep me signed in
                </span>
            </label>
        </div>

        @includeIf('shared.button.sign-in', $guestContent->authLoginProps())
    </x-form.guest>

    <p class="ruler">&nbsp;</p>

    @includeIf('shared.button.oauth', $guestContent->authOAuthProps())

    <p class="mt-4 nav-links">
        <a class="{{ trans('tw.nav-link') }}" href="{{ url('admin/forgot-password') }}">
            Forgot your password?
        </a> <br />
        <a class="{{ trans('tw.nav-link') }}" href="{{ url('admin/register') }}">
            Don't have an account? Sign up
        </a>
    </p>
@endsection
