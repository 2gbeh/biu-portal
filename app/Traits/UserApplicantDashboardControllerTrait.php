<?php
declare (strict_types = 1);

namespace App\Traits;

use Illuminate\Support\Str;

trait UserApplicantDashboardControllerTrait
{
    public function availProgrammes()
    {
        $text_f = function ($t) {
            return "<span style=\"text-transform:uppercase; letter-spacing:1px;\">{$t}</span>";
        };

        $price_f = '<h2>&#8358; 10,500<h2>';
        
        $link_f = ['href' => '/user/applicant/apply', 'text' => $text_f('apply now')];

        return (object) [
            'title' => 'Our Available Programmes',
            'summary' => 'Candidates who did not choose Benson Idahosa University in their UTME may also apply. <br />
                    We provide a regularization process, to change candidates 1st choice to Benson Idahosa University,
                    <b style="display:inline-block;">at no additional cost</b>.',
            'cards' => [
                [
                    [
                        'title' => $text_f('undergraduate'),
                        'subtitle' => $text_f('full-time'),
                        'icon' => 'fi fi-rs-diamond',
                        'list' => [
                            'Session' => '2022/2023',
                            'Programmes' => 25,
                            'Applicants' => '001',
                            'Closing Date' => 'Sep 15, 2022',
                        ],
                        'price' => $price_f,
                        'link' => $link_f,
                    ], [
                        'title' => $text_f('undergraduate'),
                        'subtitle' => $text_f('part-time'),
                        'icon' => 'fi fi-rs-fox',
                        'list' => [
                            'Session' => '2022/2023',
                            'Programmes' => 25,
                            'Applicants' => '000',
                            'Closing Date' => 'Sep 15, 2022',
                        ],
                        'price' => $price_f,
                        'link' => $link_f,
                    ], [
                        'title' => $text_f('postgraduate'),
                        'subtitle' => $text_f('full-time'),
                        'icon' => 'fi fi-rs-rocket',
                        'list' => [
                            'Session' => '2022/2023',
                            'Programmes' => 25,
                            'Applicants' => '000',
                            'Closing Date' => 'Sep 15, 2022',
                        ],
                        'price' => $price_f,
                        'link' => $link_f,
                    ],
                ],
            ],
        ];
    }

}
