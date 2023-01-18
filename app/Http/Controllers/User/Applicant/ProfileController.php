<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\AdminProfileControllerTrait;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ControllerTrait, AdminProfileControllerTrait;

    private $user_id;

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);

        $this->user_id = 1;//auth()->user()->id;
    }

    public function index(Request $request)
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'My Profile', 'breadcrumb_base' => 'Home'];

        $card_profile_props = $this->cardProfile($this->user_id);

        $nav_tabs_props = $this->navTabs();

        $tab_pane_profile_props = $this->tabPaneProfile($this->user_id);

        $tab_pane_contacts_props = $this->tabPaneContacts($request, $this->user_id);

        $tab_pane_files_props = $this->tabPaneFiles($request, $this->user_id);

        $tab_pane_links_props = $this->tabPaneLinks($request, $this->user_id);

        $tab_pane_logs_props = $this->tabPaneLogs($request, $this->user_id);

        return view('admin.profile')->with('data', (object)
            compact(
                'breadcrumb',
                'card_profile_props',
                'nav_tabs_props',
                'tab_pane_profile_props',
                'tab_pane_contacts_props',
                'tab_pane_files_props',
                'tab_pane_links_props',
                'tab_pane_logs_props',
            )
        );
    }

}
