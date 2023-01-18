<?php
declare (strict_types = 1);

namespace App\Helpers;

use App\Helpers\FormatHelper;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


// *selectToday, selectYesterday, selectByWeek, selectByMonth, selectByQuarter, selectByYear
// *selectFirst, selectLast, selectRecent.DESC.25,
class SchemaHelper
{
    const UUID = true;
    const GUARDED = ['_token', 'id', 'created_at', 'updated_at', 'deleted_at'];
    const IDENTITY = ['users', 'users_bios', 'users_contacts', 'users_files', 'users_links', 'users_roles'];

    // DEFAULT ORDER BY
    public static function orderBy(string $order = 'id DESC'): string
    {
        return 'ORDER BY ' . $order;
    }

    // DETERMINE FIELD NAME BASED ON VALUE PATTERN
    public static function detField(string $value): string
    {
        if (strpos($value, '@') !== false) {
            $field = 'email';
        } else if (strpos($value, '-') !== false) {
            $field = 'uuid';
        } else if (is_numeric($value)) {
            $field = 'id';
        } else {
            $field = 'undetermined';
        }
        return $field;
    }

    // CHECK IF FIELD EXIST IN TABLE
    public static function hasField(string $table, string $field): bool
    {
        return Schema::hasColumn($table, $field);
    }

    // AUTO-FILL TIMESTAMP FIELDS
    public static function hasAt(string $table, array $request, string $_at): array
    {
        if (self::hasField($table, $_at) && !array_key_exists($_at, $request)) {
            $request[$_at] = date('Y-m-d H:i:s');
        }
        return $request;
    }

    // QUERY EXCEPTION MODEL
    public static function queryException($err)
    {
        if (isset($err->errorInfo[2])) {
            return $err->errorInfo[2];
        } else {
            $arr = explode('Stack trace:', (string) $err);
            return array_shift($arr);
        }
    }

    //  SHARED TABLE FIELDS
    public static function extended(Blueprint $table)
    {
        $table->string('notes', 255)->nullable();
        $table->tinyInteger('status')->default(0);
        $table->timestamps();
        $table->softDeletes();
        $table->unsignedInteger('created_by')->nullable();
        $table->unsignedInteger('updated_by')->nullable();
        $table->unsignedInteger('deleted_by')->nullable();
    }

    /*
    |--------------------------------------------------------------------------
    | Basic CRUD Statements
    |--------------------------------------------------------------------------
     */

    // SchemaHelper::insert('users', ['email' => 'john@email.com', 'password' => '1234']);
    public static function insert(string $table, array $request)
    {
        $request = self::hasAt($table, $request, 'created_at');

        try {
            $bind = FormatHelper::asSqlPrepared($request);
            $values = $bind->values;
            #! return $values;
            $sql = sprintf('INSERT INTO `%s` (%s) VALUES (%s)', $table, $bind->fields, $bind->params);
            if (DB::insert($sql, $values)) {
                return (int) DB::getPdo()->lastInsertId();
            } else {
                return 0;
            }
        } catch (QueryException $err) {
            return self::queryException($err);
        }
    }

    // SchemaHelper::insertMultiple('users', [['email' => 'john@email.com'],['email' => 'jane@email.com']]);
    public static function insertMultiple(string $table, array $requests)
    {
        $requests_check = $requests;
        if (is_array(array_shift($requests_check))) {
            $res = [];
            foreach ($requests as $request) {
                array_push($res, self::insert($table, $request));
            }
            return $res;
        } else {
            return self::insert($table, $requests);
        }
    }

    // SchemaHelper::upsert('users', ['email' => 'john@email.com', 'password' => '1234'], ['email' => 'john@example.com']);
    public static function insertOrUpdate(string $table, array $request, array $where)
    {
        if (is_object(self::select($table, $where, true))) {
            return self::update($table, $request, $where);
        } else {
            return self::insert($table, $request);
        }
    }

    // SchemaHelper::select('users', ['email' => 'john@email.com', 'password' => '1234']);
    public static function select(string $table, array $where = [], bool $is_unique = false)
    {
        try {
            $where_f = '1';
            $values = [];

            if (count($where) > 0) {
                $bind = FormatHelper::asSqlPrepared($where, true);
                $values = $bind->values;

                if (count($where) > 1) {
                    $where_f = str_replace(', ', ' AND ', $bind->fieldset);
                } else {
                    $where_f = $bind->fieldset;
                }
            }

            #! return $values;
            $sql = sprintf('SELECT * FROM `%s` WHERE %s %s', $table, $where_f, self::orderBy());
            $res = DB::select($sql, $values);
            if (is_array($res) && count($res) > 0 && $is_unique === true) {
                return array_shift($res);
            } else {
                return $res;
            }
        } catch (QueryException $err) {
            return self::queryException($err);
        }
    }

    // SchemaHelper::selectById('users', 1);
    public static function selectById(string $table, int $id)
    {
        return self::select($table, ['id' => $id], true);
    }

    // SchemaHelper::selectByUuid('users', '96aec6b8-f716-4723-a7d2-7ec20494cf9f');
    public static function selectByUuid(string $table, string $uuid)
    {
        return self::select($table, ['uuid' => $uuid]);
    }

    // SELECT BY EMAIL, UUID & ID
    public static function selectByUk(string $table, string $value)
    {
        $field = self::detField($value);
        return self::select($table, [$field => $value], true);
    }

    // SELECT SQL VIEW
    public static function selectSqlView(string $view, array $where = [])
    {
        try {
            if (count($where) > 0) {
                $where_f = FormatHelper::asSqlAndOr($where);
                $sql = sprintf('SELECT * FROM `%s` WHERE %s', $view, $where_f->AND);
            } else {
                $sql = sprintf('SELECT * FROM `%s`', $view);
            }
            $res = DB::select($sql);
            return $res;
        } catch (QueryException $err) {
            return self::queryException($err);
        }
    }

    // SchemaHelper::update('users', ['email' => 'john@email.com', 'password' => '1234'], ['id' => 1]);
    public static function update(string $table, array $request, array $where = [])
    {
        $request = self::hasAt($table, $request, 'updated_at');

        try {
            $bind = FormatHelper::asSqlPrepared($request, true);
            $set_f = $bind->fieldset;
            $values = $bind->values;
            $where_n = count($where);
            $where_f = '1';

            if ($where_n > 0) {
                $bind = FormatHelper::asSqlPrepared($where, true);
                $values = array_merge($values, $bind->values);

                if ($where_n > 1) {
                    $where_f = str_replace(', ', ' AND ', $bind->fieldset);
                } else {
                    $where_f = $bind->fieldset;
                }
            }

            #! return $values;
            $sql = sprintf('UPDATE `%s` SET %s WHERE %s', $table, $set_f, $where_f);
            $res = DB::update($sql, $values);
            return is_numeric($res) && $res > 0 ? $res : null;
        } catch (QueryException $err) {
            return self::queryException($err);
        }
    }

    // SchemaHelper::updateById('users', ['email' => 'john@email.com', 'password' => '1234'], 1);
    public static function updateById(string $table, array $request, int $id)
    {
        return self::update($table, $request, ['id' => $id]);
    }

    // SchemaHelper::updateByUuid('users', '96aec6b8-f716-4723-a7d2-7ec20494cf9f');
    public static function updateByUuid(string $table, array $request, string $uuid)
    {
        return self::update($table, $request, ['uuid' => $uuid]);
    }

    // UPDATE BY EMAIL, UUID & ID
    public static function updateByUk(string $table, array $request, string $value)
    {
        $field = self::detField($value);
        return self::update($table, $request, [$field => $value]);
    }

    // SchemaHelper::delete('users', ['id' => '1']);
    public static function delete(string $table, array $where = [])
    {
        try {
            $where_n = count($where);
            $where_f = '1';
            $values = [];

            if ($where_n > 0) {
                $bind = FormatHelper::asSqlPrepared($where, true);
                $values = $bind->values;

                if ($where_n > 1) {
                    $where_f = str_replace(', ', ' AND ', $bind->fieldset);
                } else {
                    $where_f = $bind->fieldset;
                }
            }

            #! return $values;
            $sql = sprintf('DELETE FROM `%s` WHERE %s', $table, $where_f);
            $res = DB::delete($sql, $values);
            return is_numeric($res) && $res > 0 ? $res : null;
        } catch (QueryException $err) {
            return self::queryException($err);
        }
    }

    // SchemaHelper::deleteById('users', 1);
    public static function deleteById(string $table, int $id)
    {
        return self::delete($table, ['id' => $id]);
    }

    // SchemaHelper::deleteByUuid('users', '96aec6b8-f716-4723-a7d2-7ec20494cf9f');
    public static function deleteByUuid(string $table, string $uuid)
    {
        return self::delete($table, ['uuid' => $uuid]);
    }

    // DELETE BY EMAIL, UUID & ID
    public static function deleteByUk(string $table, string $value)
    {
        $field = self::detField($value);
        return self::delete($table, [$field => $value]);
    }

    // SchemaHelper::query('SELECT * FROM `users`');
    public static function query(string $sql, array $bind_values = [])
    {
        switch (strtoupper(substr($sql, 0, 6))) {
            case 'INSERT':
                return DB::insert($sql);
                break;
            case 'UPDATE':
                return DB::update($sql);
                break;
            case 'DELETE':
                return DB::delete($sql);
                break;
            default:
                try {
                    if (count($bind_values) > 0) {
                        return DB::select($sql, $bind_values);
                    } else {
                        return DB::select($sql);
                    }
                } catch (QueryException $err) {
                    return self::queryException($err);
                }
        }
    }

    // COPY TABLE WITH (default) OR WITHOUT DATA
    public static function backup(string $table, string $new_table, bool $struct_only = false)
    {
        try {
            Schema::dropIfExists($new_table);

            if ($struct_only === true) {
                return DB::statement(sprintf('CREATE TABLE `%s` LIKE `%s`', $new_table, $table));
            } else {
                return DB::transaction(function () use ($new_table, $table) {
                    DB::statement(sprintf('CREATE TABLE `%s` LIKE `%s`', $new_table, $table));
                    DB::statement(sprintf('INSERT `%s` SELECT * FROM `%s`', $new_table, $table));
                }, 1);
            }
        } catch (QueryException $err) {
            return self::queryException($err);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Helper SELECT Statements
    |--------------------------------------------------------------------------
     */

    // ACTIVITY LOG
    public static function activityLog(array $request)
    {}

    // SELECT ONLY NON-ARCHIVED ROWS
    public static function selectNoTrash(string $table, array $where = [])
    {
        $where_f = '1';
        $values = [];

        if (count($where) > 0) {
            $bind = FormatHelper::asSqlPrepared($where, true);
            $values = $bind->values;
            if (count($where) > 1) {
                $where_f = str_replace(', ', ' AND ', $bind->fieldset);
            } else {
                $where_f = $bind->fieldset;
            }
        }

        #! return $values;
        $sql = sprintf('SELECT * FROM `%s` WHERE %s AND deleted_at IS NULL %s', $table, $where_f, self::orderBy());
        return self::query($sql, $values);
    }

    // SELECT COLUMN LIST
    public static function selectColumn(string $table, string $column, bool $indexed = false)
    {
        $arr = [];
        $sql = sprintf('SELECT id, %s FROM `%s` ORDER BY %s', $column, $table, $column);
        $rows = self::query($sql);
        foreach ($rows as $row) {
            $arr[$row->id] = $row->$column;
        }
        return $indexed === true ? $arr : array_values($arr);
    }

    //
    public static function selectDistinct(string $table, string $column)
    {
        $sql = sprintf('SELECT DISTINCT %s FROM `%s` ORDER BY %s', $column, $table, $column);
        return array_map(function ($e) use ($column) {
            return $e->$column;
        }, self::query($sql));
    }

    // SELECT PATTERN MATCHING
    public static function selectLike(string $table, array $where)
    {
        $bind = FormatHelper::asSqlPrepared($where, true);
        $values = $bind->values;

        #! return $values;
        $sql = sprintf('SELECT * FROM `%s` WHERE %s', $table, $bind->pattern);
        return self::query($sql, $values);
    }

    // SchemaHelper::fetchById(['users','persons'], 1);
    public static function fetchById(array $tables, int $id, string $fk = 'user_id'): object
    {
        $arr = [];
        $i = 0;
        foreach ($tables as $table) {
            if ($i === 0) {
                $arr[$table] = self::select($table, ['id' => $id]);
            } else {
                $arr[$table] = self::select($table, [$fk => $id]);
            }
            $i++;
        }
        return (object) $arr;
    }

    // SchemaHelper::fetchByUuid(['users','persons'], '96b15fcd-3782-4b65-af57-a97341ae465b');
    public static function fetchByUuid(array $tables, string $uuid, string $fk = 'uuid'): object
    {
        $arr = [];
        foreach ($tables as $table) {
            $arr[$table] = self::select($table, [$fk => $uuid]);
        }
        return (object) $arr;
    }

    /*
    |--------------------------------------------------------------------------
    | Helper SQL Statements
    |--------------------------------------------------------------------------
     */

    // TABLES IN DATABASE
    public static function tables(string $like = '*'): array

    {
        $sql = $like === '*' ? "SHOW TABLES" : "SHOW TABLES LIKE '%" . $like . "%'";
        $res = array_map(function ($e) use ($like) {
            $e = (array) $e;
            return array_pop($e);
        }, self::query($sql));

        return $res;
    }

    // TABLE STRUCTURE
    public static function struct(string $table)
    {
        return array_map(function ($e) {
            return (array) $e;
        }, self::query('SHOW COLUMNS FROM `' . $table . '`'));
    }

    // TABLE FIELD NAMES AND IF FIELD EXIST
    public static function fields(string $table, string $field_exist = null)
    {
        $fields = array_map(function ($e) {
            return $e['Field'];
        }, self::struct($table));
        return isset($field_exist) ? in_array($field_exist, $fields) : $fields;
    }

    // ENUM FIELD CONSTANTS
    public static function enums(string $table, string $field): array
    {
        $x = '';
        foreach (self::struct($table) as $row) {
            if ($row['Field'] === $field) {
                $x = $row['Type'];
                $x = str_replace("'", '', $x);
                $x = str_replace("enum(", '', $x);
                $x = str_replace(")", '', $x);
                return explode(',', $x);
            }
        }
        return $x;
    }

    // JSON FIELD PROPERTIES
    public static function json(string $table, string $field, int $id, bool $assoc = false)
    {
        $row = self::selectById($table, $id);
        if (is_object($row) && array_key_exists($field, $row)) {
            return json_decode($row->$field, $assoc);
        }
        return is_object($row) ? "Field '" . $table . "." . $field . "' doesn't exist" : $row;
    }

    // MIGRATION VALIDATION RULES
    public static function rules(string $table, array $request = []): array
    {
        $flag = 'rule:';
        $rules = [];
        $i = $j = '';

        $rows = self::query('SHOW FULL COLUMNS FROM ' . $table);
        foreach ($rows as $row) {
            $row = (array) $row;
            $i = $row['Field'];
            $j = $row['Comment'];
            if (!in_array($i, self::GUARDED)) {
                if (strpos($j, $flag) !== false) {
                    $j = str_replace($flag, '', $j);
                } else {
                    $j = 'filled';
                }
                $rules[$i] = $j;
            }
        }

        if (count($request) > 0) {
            $rules_ = [];
            foreach ($request as $key => $value) {
                if (array_key_exists($key, $rules)) {
                    $rules_[$key] = $rules[$key];
                }
            }
            #! return [$rules_, $rules, $request];
            return $rules_;
        } else {
            return $rules;
        }
    }

    // NUMBER OF RECORDS
    public static function count(string $table)
    {
        $res = self::query('SELECT COUNT(id) AS num_rows FROM `' . $table . '`');
        return array_pop($res)->num_rows;
    }

    // SOFT-DELETE UPDATE deleted_at = null
    public static function restore(string $table, array $where)
    {
        return self::update($table, ['deleted_at' => null], $where);
    }

    // SOFT-DELETE UPDATE deleted_at = date('Y-m-d H:i:s')
    public static function trash(string $table, array $where = [])
    {
        return self::update($table, ['deleted_at' => date('Y-m-d H:i:s')], $where);
    }

    // TRUNCATE TABLE
    public static function truncate(string $table)
    {
        try {
            $num_rows = self::count($table);
            $res = self::query('TRUNCATE TABLE `' . $table . '`');
            return (object) ['response' => $res, 'affected_rows' => $num_rows];
        } catch (QueryException $err) {
            return self::queryException($err);
        }
    }

    // SESSIONIZATION TABLES
    public static function batch(array $tables, string $prefix): int
    {
        $substr = $prefix . '_';
        $substr = str_replace('-', '_', $substr);
        $substr = str_replace('/', '_', $substr);

        $i = 0;
        foreach ($tables as $table) {
            self::backup($table, $substr . $table, true);
            $i++;
        }
        return $i;
    }

    // MANUAL INSERT TRANSACTION COMMIT
    public static function transaction(array $tables, array $requests): array
    {
        $insertIds = [];
        foreach ($tables as $i => $table) {
            $request = $requests[$i];
            $insertIds[$table] = self::insert($table, $request);
        }
        return self::transactionWatch($insertIds);
    }

    // MANUAL INSERT TRANSACTION ROLLBACK
    public static function transactionWatch(array $lastInsertIds)
    {
        $res = true;
        foreach ($lastInsertIds as $table => $id) {
            if (!is_numeric($id)) {
                foreach ($lastInsertIds as $i => $j) {
                    if (is_numeric($j)) {
                        self::deleteById($i, $j);
                    }
                }
                $res = sprintf('%s: %s', $table, $id);
                break;
            }
        }
        return $res;
    }

    // ASSIGN DEFAULT VALUES TO FIELDS IF ROW EMPTY
    public static function padResult($response, string $table): object
    {
        $res = (array) $response;
        if (count($res) < 1) {
            $fields = self::fields($table);
            foreach ($fields as $j) {
                $res[$j] = null;
            }
        }

        return (object) $res;
    }

    // ASSIGN DEFAULT VALUES TO FIELDS IF TABLE EMPTY
    public static function padResultset($response, string $table, int $min_size = 1): array
    {
        $res = $response;
        $cur_size = count($res);
        $off_size = abs($cur_size - $min_size);

        if ($off_size > 0) {
            $fields = self::fields($table);
            $n = $min_size;
            for ($i = $cur_size; $i < $n; $i++) {
                foreach ($fields as $j) {
                    $res[$i][$j] = null;
                }
            }
        }

        return $res;
    }
}
