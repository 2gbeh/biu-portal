<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use App\Traits\ControllerTrait;
use App\Traits\RouteTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ProfileChangePhotoController extends Controller
{
    use ControllerTrait;

    protected $view = 'profile-change-photo', $base = 'My Profile';

    public function __construct(Request $request, Route $route)
    {
        self::construct_($request, $route);
    }

    public function create()
    {
        //
        $breadcrumb = ['breadcrumb_page' => 'Upload Passport', 'breadcrumb_base' => $this->base];

        $upload_passport_props = (object) [
            'action' => RouteTrait::store(),
        ];

        return view($this->view)->with('data', (object)
            compact(
                'breadcrumb',
                'upload_passport_props',
            )
        );
    }

    public function store(Request $request)
    {
        return back()->withInput();

        $rows = UserProfile::datable();
    }
}
