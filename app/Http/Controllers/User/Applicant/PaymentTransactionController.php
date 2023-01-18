<?php

namespace App\Http\Controllers\User\Applicant;

use App\Http\Controllers\Controller;
use App\Models\PaymentTransaction;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PaymentTransactionController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

        $this->view = 'user.applicant.payment-transactions';
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'My Transactions', 'breadcrumb_base' => 'Payments'];

        $paginator = PaymentTransaction::uid(1);

        $pager = self::pager($request, $paginator);

        $my_transactions_props = (object) [
            'thead' => [
                '#',
                'Transaction Date',
                'Amount &#8358;',
                'Depositor',
                'Narration',
                '<abbr title="Transaction Reference">TRN</abbr>',
                'Mode <i class="fas fa-shield-alt mx-1"></i>',
            ],
            'pager' => $pager,
        ];

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'my_transactions_props',
            )
        );
    }
}
