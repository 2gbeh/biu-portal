<?php
declare (strict_types = 1);

namespace App\Traits;

use BladeHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait Literate
{
    public static function uid(int $uid, $limit = 25)
    {
        return self::where('user_id', $uid)->orderBy('id', 'desc')->paginate($limit);
    }

    public static function dl(string $column)
    {
        $list = self::select($column)->groupBy($column)->get()->toArray();
        return array_map(function ($e) {
            return array_shift($e);
        }, $list);
    }

    public static function ddl(string $value = 'value', string $key = 'id')
    {
        $list = self::select($key, $value)->groupBy($value)->get()->toArray();

        foreach ($list as $e) {
            $i = $e[$key];
            $j = $e[$value];
            $li[$i] = $j;
        }
        return $li;
    }

    public static function datable()
    {
        return self::orderBy('id', 'desc')->cursor();
    }

    public static function pager(Request $request, $paginator)
    {
        $p = $paginator->toArray();
        $q = $request->query('page', 1);

        $per = $p['per_page'];

        return (object) [
            'caption' => BladeHelper::showing_($p['from'], $p['to'], $p['total']),
            'insight' => sprintf("Showing %d to %d of %d entries", $p['from'], $p['to'], $p['total']),
            'data' => $p['data'],
            'links' => $paginator->links(),
            'limit' => $per,
            'offset' => ($per * $q) - $per + 1,
        ];
    }

    public static function queryException($err)
    {
        //
        if (isset($err->errorInfo[2])) {
            return $err->errorInfo[2];
        } else {
            $arr = explode('Stack trace:', (string) $err);
            return array_shift($arr);
        }
    }
}
