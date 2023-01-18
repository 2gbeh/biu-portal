<?php
declare (strict_types = 1);

namespace App\Helpers;

class ContextHelper
{
    // config/context.php (constants)
    public static function get(string $key = null)
    {
        $ctx = config('context');

        if (is_null($key)) {
            return (object) $ctx;
        } else {
            $arr = explode('.', $key);
            $i = $arr[0];
            $j = $arr[1] ?? null;
            $k = $arr[2] ?? null;

            if ($k) {
                return $ctx[$i][$j][$k];
            } else if ($j) {
                return $ctx[$i][$j];
            } else {
                return $ctx[$i];
            }
        }
    }

    public static function ddlNoKey(string $key)
    {
        $li = [];
        $arr = self::get($key);

        foreach ($arr as $k) {
            if (!is_null($k)) {
                $li[$k] = $k;
            }
        }
        
        return $li;
    }
}
