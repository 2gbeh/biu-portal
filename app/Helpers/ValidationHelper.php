<?php
declare (strict_types = 1);

namespace App\Helpers;

use App\Helpers\EnumHelper;
use App\Helpers\SchemaHelper;

class ValidationHelper
{
    const SYMBOLS = [
        '!' => 'bail',
        '*' => 'required',
        '#' => 'nullable',
        '+' => 'filled',
        '?' => 'boolean',
        '<' => 'max:',
        '>' => 'min:',
        '^' => 'size:',
        '~' => 'unique:',
        '=' => 'exists:',

        '%' => 'date_format:',
        ',,' => 'in:',
        '..' => 'file',
        '--' => 'date',
        '@' => 'email',
        '\d' => 'numeric',
        ':/' => 'url',
        './' => 'image',
        '[]' => 'array',
        '{}' => 'json',
    ];

    public static function test(string $table = 'persons') #: object

    {
        $symbols = self::SYMBOLS;
        $input = [];
        foreach ($symbols as $symbol => $rule) {
            if (in_array($symbol, ['<', '>', '^'])) {
                $symbol .= 3;
            }
            if (in_array($symbol, ['~'])) {
                $symbol .= 'users';
            }
            if (in_array($symbol, ['='])) {
                $symbol .= '.';
            }
            if (in_array($symbol, ['%'])) {
                $symbol .= 'd/m/Y';
            }
            if (in_array($symbol, [',,'])) {
                $symbol .= 'GENDER';
            }
            $input[] = $symbol;
            // $input[] = sprintf('r-1|%s|r-n', $symbol);
        }

        $output = self::rules($table, $input);
        return (object) ['symbols' => $symbols, 'input' => $input, 'output' => $output];
    }

    public static function rules(string $table, array $rules, bool $named_fields = false)
    {
        $fields = [];
        if ($named_fields === true) {
            $fields = array_keys($rules);
        } else {
            $fields = array_filter(
                SchemaHelper::fields($table),
                function ($field) {
                    return !in_array($field, SchemaHelper::GUARDED);
                });
            $fields = array_values($fields);
        }

        $arr = $enum = [];
        $field = $rule = $k = $csv = '';
        $symbols = self::SYMBOLS;
        $rules_f = array_values($rules);

        foreach ($fields as $i => $field) {
            if (isset($rules_f[$i])) {
                $rule = $rules_f[$i];
                foreach ($symbols as $key => $value) {
                    if (strpos($rule, ',,') !== false) {
                        $k = $rule;
                        $k = explode(',,', $k);
                        $k = array_pop($k);
                        $k = explode('|', $k);
                        $k = array_shift($k);
                        $rule = str_replace($k, EnumHelper::csv($k), $rule);
                        $rule = str_replace(',,', 'in:', $rule);
                    } else {
                        $rule = str_replace($key, $value, $rule);
                    }
                }

                if (strpos($rule, ':.') !== false) {
                    $rule = str_replace('.', $table, $rule);
                }
                $arr[$field] = $rule;
            }
        }
        return $arr;
    }
}
