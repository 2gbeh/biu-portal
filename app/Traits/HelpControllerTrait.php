<?php
declare (strict_types = 1);

namespace App\Traits;

use BladeHelper as h;
use ContextHelper as ctx;
use Illuminate\Routing\Route;

trait HelpControllerTrait
{

    public function titleCard()
    {
        return [
            'title' => "Welcome to BIU Portal Help Center",
            'summary' => ctx::get('contact_us'),
            'action' => [
                [
                    'a' => ['color' => 'danger', 'href' => 'mailto:info@biu.edu.ng?cc=ictdirector@biu.edu.ng&subject=BIU Portal Help Center'],
                    'i' => 'fas fa-paper-plane',
                    'text' => 'Send Email',
                ],
                [
                    'a' => ['color' => 'success', 'href' => 'tel:+2348149906200'],
                    'i' => 'fas fa-phone-alt',
                    'text' => 'Phone Call',
                ],
            ],
        ];
    }

    public function contactUs()
    {
        $phone = ctx::get('phone_f');
        $email = ctx::get('email_2');
        $website = ctx::get('website_f');
        $helpline_f = '<b>Telephone</b> : %s<br/> <b>Email Address</b> : %s <p>%s</p>';

        return (object) [
            'id' => 'contact-us',
            'expanded' => true,
            'columned' => true,
            'title' => 'Contact Us',
            'list' => [
                [
                    'question' => 'Office Address',
                    'answer' => ctx::get('address_f'),
                ],
                [
                    'question' => 'Contact Us',
                    'answer' => sprintf($helpline_f, $phone, $email, $website),
                ],
            ],
        ];
    }

    public function aboutUs()
    {
        $core_values = ctx::get('core_values');

        return (object) [
            'id' => 'about-us',
            'expanded' => false,
            'columned' => false,
            'title' => 'About Us',
            'list' => [
                [
                    'question' => 'Our Vision',
                    'answer' => ctx::get('vision'),
                ],
                [
                    'question' => 'Our Mission',
                    'answer' => ctx::get('mission'),
                ],
                [
                    'question' => 'Core Values (TOP-TIAA)',
                    'answer' => h::ol($core_values),
                ],
                [
                    'question' => 'Core Purpose',
                    'answer' => ctx::get('core_purpose'),
                ],
            ],
        ];
    }

}
