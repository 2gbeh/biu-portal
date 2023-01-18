<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\AdminUserControllerTrait;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UserController extends Controller
{
    use ControllerTrait, AdminUserControllerTrait;

    protected $view = 'admin.users', $base = 'Accounts';

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Manage Accounts', 'breadcrumb_base' => $this->base];

        $manage_accounts_props = $this->userIndex($request);

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'manage_accounts_props',
            )
        );
    }

    public function create()
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Create Account', 'breadcrumb_base' => $this->base];

        $create_account_props = $this->userCreate();

        return view("{$this->view}-create")->with('data', (object)
            compact(
                'breadcrumb',
                'create_account_props',
            )
        );
    }
}
