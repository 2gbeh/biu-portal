<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\AdminPaymentInvoiceControllerTrait;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PaymentInvoiceController extends Controller
{
    use ControllerTrait, AdminPaymentInvoiceControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

        $this->view = 'admin.payment-invoices';
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'View Invoices', 'breadcrumb_base' => 'Payments'];

        $view_invoices_props = $this->paymentInvoiceIndex($request);
        
        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'view_invoices_props',
            )
        );
    }

    public function create()
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Create Invoice', 'breadcrumb_base' => 'Payments'];

        $create_invoice_props = $this->paymentInvoiceCreate();

        return view("{$this->view}-create")->with('data', (object)
            compact(
                'breadcrumb',
                'create_invoice_props',
            )
        );
    }
}
