<?php

declare (strict_types = 1);

namespace App\Helpers;

use App\Helpers\EnumHelper;

class ListHelper
{

    public static function get(string $name): array
    {
        $name = str_ireplace('-', '_', strtoupper($name));
        return constant(EnumHelper::class . '::' . $name);
    }

    public static function in(string $name): array
    {
        $output = [];
        foreach (self::get($name) as $key => $constant) {
            if (!is_null($constant)) {
                array_push($output, $key);
            }
        }
        return $output;
    }

    public static function of(string $name): array
    {
        $output = [];
        foreach (self::get($name) as $key => $constant) {
            if (!is_null($constant)) {
                array_push($output, $constant);
            }
        }
        return $output;
    }

    public static function abbr(string $name): array
    {
        $output = [];
        foreach (self::get($name) as $key => $constant) {
            if (!is_null($constant)) {
                array_push($output, substr($constant, 0, 3));
            }
        }
        return $output;
    }

    public static function csv(string $name, bool $of_keys = false): string
    {
        $output = '';
        foreach (self::get($name) as $key => $constant) {
            if (!is_null($constant)) {
                if ($of_keys === true) {
                    $output .= sprintf('%s,', $key);
                } else {
                    $output .= sprintf('%s,', $constant);
                }
            }
        }
        $output = rtrim($output, ', ');
        return $output;
    }

    public static function ddl(string $name): array
    {
        $output = [];
        foreach (self::get($name) as $key => $constant) {
            if (!is_null($constant)) {
                $output[$key] = $constant;
            }
        }
        return $output;
    }

    public static function ddlNoKey(string $name): array
    {
        $output = [];
        foreach (self::get($name) as $k) {
            if (!is_null($k)) {
                $output[$k] = $k;
            }
        }
        return $output;
    }

    public static function api($props): array
    {
        $enum = is_string($props) ? self::get($props) : (array) $props;
        $arr = $obj = [];
        $i = 0;
        $sn = 1;
        foreach ($enum as $key => $constant) {
            if (!is_null($constant)) {
                $obj['id'] = $sn;
                $obj['key'] = $key;
                $obj['value'] = $constant;
                $obj['constant'] = strtoupper($constant);
                array_push($arr, $obj);
                $sn++;
            }
            $i++;
        }
        return $arr;
    }

    public static function shift(array $enum): array
    {
        $arr = $enum;
        if (is_null(array_shift($arr))) {
            array_shift($enum);
        }
        return $enum;
    }

    public static function swap(array $enum, $constant)
    {
        // $keys = array_map('strtolower',array_keys($enum));
        // $k = strtolower($constant);
        $keys = array_keys($enum);
        $k = $constant;

        if (in_array($k, $keys)) {
            return $enum[$constant];
        } else if (in_array($k, $enum)) {
            return array_search($constant, $enum);
        } else {
            return $constant;
        }
    }
}
