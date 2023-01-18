<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wifi;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class WifiController extends Controller
{
    use ControllerTrait;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

        $this->view = 'admin.wifi';
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Wi-Fi Settings', 'breadcrumb_base' => 'Accounts'];

        $rows = Wifi::datable();

        $wifi_settings_props = (object) [
            'form' => [[
                [
                    'col' => 6,
                    'type' => 'email',
                    'label' => '*Email',
                    'name' => 'email',
                    'placeholder' => 'Ex. example@domain.com',
                    'constraint' => 'required',
                ], [
                    'col' => 6,
                    'label' => '*Password',
                    'name' => 'password',
                    'placeholder' => 'Ex. 1234',
                    'constraint' => 'required',
                ],
            ]],
            'thead' => ['#', 'Username', 'Password', 'Date', 'Action'],
            'tbody' => $rows,
        ];

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'wifi_settings_props',
            )
        );
    }
}
