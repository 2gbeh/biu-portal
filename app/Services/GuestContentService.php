<?php

namespace App\Services;
use App\Traits\RouteTrait;

class GuestContentService
{
    public function authLoginProps()
    {
        return ['button_sign_in_class' => ['btn-login' => 'btn-login']];
    }

    public function authRegisterProps()
    {
        return ['button_sign_in_text' => 'Register'];
    }

    public function authForgotPasswordProps()
    {
        return ['button_sign_in_text' => 'Reset Password'];
    }

    public function authResetPasswordProps()
    {
        return ['button_sign_in_text' => 'Change Password'];
    }

    public function authOAuthProps()
    {
        return ['button_oauth_isp' => 'gmail'];
    }

    public function authImageProps()
    {
        $backdrop = RouteTrait::isTenant('card_env_crop.png', 'card_student_crop.png', 'card_library_crop.png');
        return 'images/' . $backdrop;
    }
}
