<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\AdminPaymentGatewayControllerTrait;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PaymentGatewayController extends Controller
{
    use ControllerTrait, AdminPaymentGatewayControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

        $this->view = 'admin.payment-gateways';
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'View Gateways', 'breadcrumb_base' => 'Payments'];

        $view_gateways_props = $this->paymentGatewayIndex($request);

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'view_gateways_props',
            )
        );
    }

    public function create()
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Create Gateway', 'breadcrumb_base' => 'Payments'];

        $create_gateway_props = $this->paymentGatewayCreate();

        return view("{$this->view}-create")->with('data', (object)
            compact(
                'breadcrumb',
                'create_gateway_props',
            )
        );
    }
}
