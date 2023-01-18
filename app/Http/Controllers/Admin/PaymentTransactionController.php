<?php

namespace App\Http\Controllers\Admin;

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
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'View Transactions', 'breadcrumb_base' => 'Payments'];

        $paginator = PaymentTransaction::paginate_();

        $pager = self::pager($request, $paginator);

        $view_transactions_props = (object) [
            'button' => ['href' => '?', 'color' => 'primary', 'icon' => 'fas fa-sync-alt', 'text' => 'Refresh'],
            'input' => ['action' => 'users.show', 'name' => 'slug', 'disabled' => 'disabled'],
            'thead' => [
                '#',
                'Transaction Date',
                '<abbr title="Transaction Reference">TRN</abbr>',
                'Type & Mode',
                'Amount &#8358;',
                '<abbr title="Response Code">R/C</abbr>',
                'Account',  
                'Depositor',
                'Narration',
                '',
            ],
            'pager' => $pager,
        ];

        return view('admin.payment-transactions')->with('data', (object)
            compact(
                'breadcrumb',
                'view_transactions_props',
            )
        );
    }
}
