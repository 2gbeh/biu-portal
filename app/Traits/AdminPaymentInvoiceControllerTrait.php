<?php

namespace App\Traits;

use App\Models\PaymentInvoice;
use App\Models\MapSessionsToProgramme;
use App\Traits\RouteTrait;
use EnumHelper as k;
use Illuminate\Http\Request;

trait AdminPaymentInvoiceControllerTrait
{
    public function paymentInvoiceIndex(Request $request)
    {
        $paginator = PaymentInvoice::paginate_();

        $pager = self::pager($request, $paginator);

        return (object) [
            'button' => ['href' => RouteTrait::create(), 'color' => 'success', 'icon' => 'fas fa-plus-circle', 'text' => 'Add New'],
            'input' => ['action' => 'users.show', 'name' => 'slug', 'disabled' => 'disabled'],
            'thead' => [
                '#',
                'Invoice',
                'Fee &#8358;',
                '<abbr title="Pear SDC">VAT</abbr> &#8358;',
                'Gateway',
                'Session',
                'Programme',
                'Date',
                '',
            ],
            'pager' => $pager,
        ];
    }

    public function paymentInvoiceCreate()
    {
        $dl_invoice = PaymentInvoice::dl('invoice');
        $ddl_map_sp = MapSessionsToProgramme::sessionProgrammeView();

        return [
            'toolbar' => (object) [
                'button' => ['href' => RouteTrait::index(), 'color' => 'success', 'icon' => 'fas fa-arrow-circle-left', 'text' => 'View All', 'event' => null],
            ],
            'form' => [[
                [
                    'type' => 'search',
                    'label' => '*Invoice Title',
                    'name' => 'invoice',
                    'datalist' => $dl_invoice,
                    'constraint' => 'required',
                ],
            ], [
                [
                    'col' => 6,
                    'type' => 'number',
                    'label' => '*Fee (&#8358;)',
                    'name' => 'fee',
                    'constraint' => 'required',
                ], [
                    'col' => 6,
                    'type' => 'number',
                    'label' => '*VAT (&#8358;)',
                    'name' => 'vat',
                    'placeholder' => 'Pear SDC %',
                    'constraint' => 'required',
                ],
            ], [
                [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Gateway Name',
                    'name' => 'payment_gateway_id',
                    'options' => k::ddlNoKey('PAY_ISP'),
                    'constraint' => 'required',
                ], [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Session Programme',
                    'name' => 'map_sessions_to_programme_id',
                    'options' => $ddl_map_sp,
                    'constraint' => 'required',
                ],
            ],
            ],
        ];
    }
}
