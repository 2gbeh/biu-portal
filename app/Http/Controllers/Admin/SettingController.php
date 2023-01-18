<?php

namespace App\Http\Controllers\Admin;

use App\Events\SelectEvent;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class SettingController extends Controller
{
    use ControllerTrait;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Route $route)
    {
        //
        event(new SelectEvent([$request, $route]));

        $breadcrumb = ['breadcrumb_page' => 'App Settings', 'breadcrumb_base' => 'Webmaster'];

        $paginator = Setting::select('name', 'value', 'id')->paginate(25);

        $pager = self::pager($request, $paginator);

        $app_settings_props = (object) [
            'title' => 'Environment Variables',
            'thead' => ['#', 'Name', 'Value', ''],
            'caption' => $pager->caption,
            'editable' => false,
            'numbered' => true,
            'paginated' => $pager->limit,
            'tbody' => $pager->data,
            'iter' => $pager->offset,
            'pager' => $pager,
        ];

        return view('admin.settings')->with('data', (object)
            compact(
                'breadcrumb',
                'app_settings_props'
            )
        );
    }
}
