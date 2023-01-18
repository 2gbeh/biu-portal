<?php

namespace App\Http\Controllers\User\Applicant;

use App\Http\Controllers\Controller;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PaymentInvoiceController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

        $this->view = 'user.applicant.payment-invoice';
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'My Invoice', 'breadcrumb_base' => 'Payments'];

        $view_invoices_props = [];

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'view_invoices_props',
            )
        );
    }
}
