<?php

declare (strict_types = 1);

namespace App\Helpers;

use Illuminate\Http\Response;

// TODO  li, td, dl, ddl, xml, json
class FormatHelper
{

    public static function isx(): bool
    {
        return $_SERVER['SERVER_NAME'] == '127.0.0.1' || $_SERVER['SERVER_NAME'] == 'localhost';
    }

    // CSV FORMAT
    public static function asCSV(array $enum, bool $with_space = false): string
    {
        $space = $with_space === true ? ' ' : '';
        $output = '';
        foreach ($enum as $constant) {
            if (!is_null($constant)) {
                $output .= sprintf('%s,%s', $constant, $space);
            }
        }
        $output = rtrim($output, ', ');
        return $output;
    }

    // UI COMPONENT CHIPS
    public static function asChips(array $enum, bool $with_hide = false): string
    {
        $hide = $with_hide === true ? '<a href="#" onClick="hideChipsItem(this)">&times;</a>' : '';
        $output = '';
        foreach ($enum as $key => $constant) {
            if (!is_null($constant)) {
                $output .= sprintf('<li class="chips-item" id="chips-item-%s">%s %s</li>', $key, $constant, $hide);
            }
        }
        return '<ul class="chips" id="chips">' . $output . '</ul>';
    }

    // ARRAY LIST TO JSON LIST Ex. [1 => 'john@email.com'] TO [{id:1, email: 'john@email.com'},]
    public static function asJsonCollection(array $list, array $keys, $as_collection = true): array
    {
        $arr = $obj = [];
        foreach ($list as $key => $value) {
            $obj[$keys[0]] = $key;
            $obj[$keys[1]] = $value;

            if ($as_collection === true) {
                array_push($arr, (object) $obj);
            } else {
                array_push($arr, $obj);
            }
        }
        return $arr;
    }

    // BASIC HTTP RESPONSE WITH DATA, MESSAGE AND STATUS CODE
    public static function asJsonResponse(bool $eval, $data = [], $error = 'Data not found'): Response
    {
        if ($eval === true) {
            return response([
                'data' => $data,
                'size' => is_array($data) ? count($data) : null,
                'message' => null,
            ], 200);
        } else {
            return response([
                'data' => [],
                'size' => 0,
                'message' => $error,
            ], 400);
        }
    }

    // JSON STRINGIFY ASSOC ARRAY
    public static function asJsonString(array $request): string
    {
        return (string) json_encode($request);
    }

    // PARAMETER BINDINGS Ex. (? ?) OR (:email, :password) OR (email = :email, password = :password)
    public static function asSqlPrepared(array $request, bool $as_named_params = false): object
    {
        $fields = $fieldset = $pattern = $params = '';
        $values = [];

        foreach ($request as $key => $value) {
            $fields .= $key . ', ';
            $fieldset .= $key . ' = :' . $key . ', ';
            $pattern .= $key . ' LIKE CONCAT("%", :' . $key . ', "%") OR ';

            if ($as_named_params === true) {
                $params .= ':' . $key . ', ';
                $values[$key] = $value;
            } else {
                $params .= '?, ';
                array_push($values, $value);
            }
        }

        $output = [
            'fields' => rtrim($fields, ', '),
            'fieldset' => rtrim($fieldset, ', '),
            'pattern' => rtrim($pattern, ' OR '),
            'params' => rtrim($params, ', '),
            'values' => $values,
        ];
        return (object) $output;
    }

    // FORMAT ASSOC_ARRAY AS WHERE AND/OR CLAUSE Ex. ['x'=>1,'y'=>2] to x=1 AND y=2
    public static function asSqlAndOr(array $where): object
    {
        $arr = [];
        $buf = '';
        foreach ($where as $k => $v) {
            $buf = is_numeric($v) ? $k . ' = ' . $v : $k . ' = "' . $v . '"';
            array_push($arr, $buf);
        }
        $output = [
            'AND' => implode(' AND ', $arr),
            'OR' => implode(' OR ', $arr),
        ];
        return (object) $output;
    }

    // FORMAT ASSOC_ARRAY AS WHERE IN/BETWEEN CLAUSE Ex. ['x'=>[1,2]] to x IN (1,2)
    public static function asSqlInBetween(array $where): object
    {
        $arr = [];
        $buf = '';
        foreach ($where as $field => $list) {
            foreach ($list as $e) {
                $buf = is_numeric($e) ? $e : '"' . $e . '"';
                array_push($arr, $buf);
            }
        }
        $output = [
            'IN' => sprintf('%s IN (%s)', $field, implode(', ', $arr)),
            'BETWEEN' => sprintf('%s BETWEEN %s', $field, implode(' AND ', $arr)),
        ];
        return (object) $output;
    }

    // CLASS NAME TO TABLE NAME Ex. 'PaymentsTables|CreatePaymentsTables' to '2022_09_05_000000_create_payments_tables'.
    public static function asMigrationFile(string $class): string
    {
        $substr = str_replace('Create', '', $class);

        $output = '';
        foreach (str_split($substr) as $char) {
            if (preg_match('/[A-Z]/', $char)) {
                $output .= '_' . strtolower($char);
            } else {
                $output .= $char;
            }
        }
        return sprintf('create%s.php', $output);
    }

    // CLASS NAME TO TABLE NAME Ex. 'CreatePersonalAccessTokensTable' to 'personal_access_tokens'.
    public static function asSqlTable(string $class): string
    {
        $substr = $class;
        $substr = str_replace('Create', '', $substr);
        $substr = str_replace('Table', '', $substr);

        $output = '';
        foreach (str_split($substr) as $char) {
            if (ctype_upper($char)) {
                $output .= '_' . strtolower($char);
            } else {
                $output .= $char;
            }
        }
        return ltrim($output, '_');
    }

    // CLASS NAME TO VIEW NAME Ex. 'CreateManagerReportView' to 'view_manager_report'.
    public static function asSqlView(string $class): string
    {
        $substr = $class;
        $substr = str_replace('View', '', $substr);
        $substr = str_replace('Create', 'View', $substr);

        $output = '';
        foreach (str_split($substr) as $char) {
            #! if(preg_match('/[A-Z]/', $char)){
            if (ctype_upper($char)) {
                $output .= '_' . strtolower($char);
            } else {
                $output .= $char;
            }
        }
        return ltrim($output, '_');
    }

    // EXTRACT COLUMN FROM DATASET Ex. Ex. [[id=>1, email=>'john@email.com'],] to [1 => 'john@email.com']
    public static function asSqlTableColumn(array $array, string $column): array
    {
        $arr = [];
        foreach ($array as $row) {
            $arr[$row->id] = $row->$column;
        }
        return $arr;
    }

    // TABLE NAME TO BACKUP FILENAME Ex. users = 19700101000000_backup_users_table.bak
    public static function asSqlTableBackup(string $table): string
    {
        $timestamp = date('YmdHis');
        $output = sprintf('%s_backup_%s.bak', $timestamp, $table);
        return $output;
    }

    // API ROUTE TO TABLE NAME Ex. http://127.0.0.1:8000/api/privilege/roles-has-permissions/search/1 = roles_has_permissions
    public static function asBaseRoute(string $url, string $prefix = ''): string
    {
        $base = basename($url);
        $params = explode('/', $url);
        array_unshift($params, $url);
        array_push($params, $base);

        if (
            is_numeric($base) ||
            strpos($url, '/slug') !== false ||
            strpos($url, '/search') !== false ||
            strpos($url, '/context') !== false
        ) {
            $url = str_replace('/' . $base, '', $url);
            $url = str_replace('/slug', '', $url);
            $url = str_replace('/search', '', $url);
            $url = str_replace('/context', '', $url);
            $base = basename($url);
        }

        $base = str_replace('-', '_', $base);
        if (strlen($prefix) > 0 && $base !== $prefix) {
            $base = $prefix . '_' . $base;
        }

        return $base;
    }

    // CHECK API ROUTE INCLUDES
    public static function hasBaseRoute(string $url, array $prefix): bool
    {
        return in_array(basename($url), $prefix);
    }

    // MERGE NESTED TABLE COLLECTION WITH PREFIX
    public static function asFlatList(array $collection): array
    {
        /*
        users : [ [{..}, {..}], [{..}, {..}] ]
        persons : [ [{..}, {..}], [{..}, {..}] ]
        [ users: {...}, persons : {...}, ]
         */
        $arr = [];
        foreach ($collection as $table => $row) {
            foreach ($row as $field => $value) {
                $i = $table . '_' . $field;
                $arr[$i] = $value;
            }
        }
        return $arr;
    }

    // EXCLUDE FIELDS FROM ARRAY
    public static function excludeColumnsFromArray(array $data, array $ignoreColumnNames): array
    {
        $data_new = [];
        foreach ($data as $i => $row) {
            foreach ($row as $key => $value) {

                if (!in_array($key, $ignoreColumnNames)) {
                    $data_new[$i][$key] = $value;
                }

            }
        }
        return $data_new;
    }
}
