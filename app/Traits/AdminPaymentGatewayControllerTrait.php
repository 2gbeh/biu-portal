<?php

namespace App\Traits;

use App\Models\PaymentGateway;
use App\Traits\RouteTrait;
use EnumHelper as k;
use Illuminate\Http\Request;

trait AdminPaymentGatewayControllerTrait
{
    public function paymentGatewayIndex(Request $request)
    {
        $paginator = PaymentGateway::paginate_();

        $pager = self::pager($request, $paginator);

        return (object) [
            'button' => ['href' => RouteTrait::create(), 'color' => 'success', 'icon' => 'fas fa-plus-circle', 'text' => 'Add New'],
            'input' => ['action' => 'users.show', 'name' => 'slug', 'disabled' => 'disabled'],
            'thead' => [
                '#',
                'Gateway',
                'Charges &#8358;',
                'API Docs',
                'Tech Support',
                'Date',
                '',
            ],
            'pager' => $pager,
        ];
    }

    public function paymentGatewayCreate()
    {
        $info = '<i class="fas fa-question-circle mx-1 text-info" role="button"></i>';
        $json = '{ "key": { "key": "value" },... }';

        return [
            'toolbar' => (object) [
                'button' => ['href' => RouteTrait::index(), 'color' => 'success', 'icon' => 'fas fa-arrow-circle-left', 'text' => 'View All', 'event' => null],
            ],
            'form' => [[
                [
                    'col' => 3,
                    'type' => 'select',
                    'label' => '*Gateway Name',
                    'name' => 'gateway',
                    'options' => k::ddlNoKey('PAY_ISP'),
                    'constraint' => 'required',
                ], [
                    'col' => 3,
                    'type' => 'number',
                    'label' => '*Charges (&#8358;)',
                    'name' => 'charges',
                    'constraint' => 'required',
                ], [
                    'col' => 6,
                    'type' => 'url',
                    'label' => '*API Documentation',
                    'name' => 'api_docs',
                    'constraint' => 'required',
                ],
            ], [
                [
                    'col' => 6,
                    'label' => 'Contact Name',
                    'name' => 'contact_name',
                    'placeholder' => 'N/b: Surname first',
                ], [
                    'col' => 3,
                    'label' => 'Contact Email',
                    'name' => 'contact_email',
                    'placeholder' => 'Ex. example@domain.com',
                ], [
                    'col' => 3,
                    'label' => 'Contact Number',
                    'name' => 'contact_phone',
                    'placeholder' => 'Ex. +1(234)567-890',
                ],
            ], [
                [
                    'col' => 4,
                    'label' => 'Test Cards' . $info,
                    'name' => 'test_cards',
                    'placeholder' => $json,

                ], [
                    'col' => 4,
                    'label' => 'Test Parameters' . $info,
                    'name' => 'test_param',
                    'placeholder' => $json,
                ], [
                    'col' => 4,
                    'label' => 'Test Curl Request' . $info,
                    'name' => 'test_curl',
                    'placeholder' => $json,
                ],
            ], [
                [
                    'col' => 6,
                    'label' => 'Live Parameters' . $info,
                    'name' => 'live_param',
                    'placeholder' => $json,
                ], [
                    'col' => 6,
                    'label' => 'Live Curl Request' . $info,
                    'name' => 'live_curl',
                    'placeholder' => $json,
                ],
            ],
            ],
        ];
    }
}
