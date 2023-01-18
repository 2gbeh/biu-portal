<?php
declare (strict_types = 1);

namespace App\Traits;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

trait RouteTrait
{
    public static function v()
    {
        return 'javascript:void();';
    }

    public static function h()
    {
        return '#!';
    }

    public static function thisUrl()
    {
        return url()->current();
    }

    public static function thisRoute()
    {
        return Route::currentRouteName();
    }

    public static function back()
    {
        return url()->previous();
    }

    public static function add($param)
    {
        return self::thisUrl() . $param;
    }

    public static function rmv($find)
    {
        return str_replace($find, '', self::thisUrl());
    }

    public static function repl($find, $repl = '')
    {
        return str_replace($find, $replace, self::thisUrl());
    }

    public static function index($slug = null)
    {
        $url = self::thisUrl();
        foreach (['/create', '/edit'] as $k) {
            $url = str_replace($k, '', $url);
        }

        return is_null($slug) ? $url : str_replace($slug, '', $url);
    }

    public static function create()
    {
        return self::thisUrl() . '/create';
    }

    public static function store()
    {
        $arr = explode('.', self::thisRoute());
        return $arr[0] . '.store';
    }

    public static function show($slug)
    {
        return self::thisUrl() . "/{$slug}";
    }

    public static function edit($slug)
    {
        return self::thisUrl() . "/{$slug}/edit";
    }

    public static function pageTitle()
    {
        $portal = env('APP_NAME');
        $routes = config('context.routes');

        foreach ($routes as $key => $value) {
            if (request()->is($key)) {
                $portal = $value;
            }
        }

        return $portal;
    }

    public static function isStaff()
    {
        return strpos(self::pageTitle(), 'Staff') !== false;
    }

    public static function isStudent()
    {
        return strpos(self::pageTitle(), 'Student') !== false;
    }

    public static function isApplicant()
    {
        return strpos(self::pageTitle(), 'Admission') !== false;
    }

    public static function isTenant( /* args */)
    {
        $args = func_get_args();

        if (self::isApplicant()) {
            return $args[0];
        } else if (self::isStudent()) {
            return $args[1];
        } else {
            return $args[2];
        }
    }
}
