<?php
declare (strict_types = 1);

namespace App\Traits;

use App\Events\DeleteEvent;
use App\Events\InsertEvent;
use App\Events\SelectEvent;
use App\Events\UpdateEvent;
use App\Traits\Literate;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;

trait ControllerTrait
{
    use Literate;

    public static function construct_(Request $request, Route $route)
    {
        switch ($route->getActionMethod()) {
            case 'store':
                event(new InsertEvent([$request, $route]));
                break;
            case 'update':
                event(new UpdateEvent([$request, $route]));
                break;
            case 'destroy':
                event(new DeleteEvent([$request, $route]));
                break;
            default:
                event(new SelectEvent([$request, $route]));
        }

    }
    public static function index_(Request $request)
    {
    }

    public static function create_(Request $request)
    {
    }

    public static function store_(Request $request)
    {
    }

    public static function show_(Request $request)
    {
    }

    public static function edit_(Request $request)
    {
    }

    public static function update_(Request $request)
    {
    }

    public static function destroy_(Request $request)
    {
    }
}
