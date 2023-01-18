<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use Illuminate\Http\Request;
use FormatHelper;
use SchemaHelper;

class ApiController extends Controller
{
    //
    protected $table;

    public function __construct(Request $request)
    {
        $urlArray = explode('/', $request->url());
        $sqlKey = array_search('sql', $urlArray);
        $i = $sqlKey + 1;
        $this->table = str_replace('-', '_', $urlArray[$i]);
    }

    public function validator(Request $request)
    {
        $rules = SchemaHelper::rules($this->table);
        $validated = $v = $request->validate($rules);

        if ($this->table === 'users') {
            if (isset($v['password'])) {
                $validated['password'] = AppHelper::password($v['password']);
            }
            if (isset($v['remember_token'])) {
                $validated['remember_token'] = AppHelper::rememberToken($v['remember_token']);
            }
        }

        return $validated;
    }

    public function index(string $table)
    {
        return ApiResource::collection(User::all());

        $res = SchemaHelper::select($table);
        return FormatHelper::asJsonResponse(is_array($res), $res, $res);
    }

    public function store(Request $request, string $table)
    {
        $rec = $this->validator($request);
        if ($this->table === 'users') {
            $rec['uuid'] = AppHelper::uuid();
        }

        $res = SchemaHelper::insert($this->table, $rec);
        return FormatHelper::asJsonResponse(is_int($res), $res, $res);
    }

    public function show(string $table, $uk)
    {
        return new ApiResource($user);

        $field = SchemaHelper::detField($uk);
        $res = SchemaHelper::select($this->table, [$field => $uk], true);
        return FormatHelper::asJsonResponse(is_object($res), $res, $res);
    }

    public function update(Request $request, string $table, $uk)
    {
        $field = SchemaHelper::detField($uk);
        $rec = $this->validator($request);
        $res = SchemaHelper::update($this->table, $rec, [$field => $uk]);
        return FormatHelper::asJsonResponse(is_int($res), $res, $res);
    }

    public function destroy(string $table, $uk)
    {
        $field = SchemaHelper::detField($uk);
        $res = SchemaHelper::delete($this->table, [$field => $uk]);
        return FormatHelper::asJsonResponse(is_int($res), $res, $res);
    }

    public function save(Request $request, string $table, $uk)
    {
        $field = SchemaHelper::detField($uk);
        $rec = $this->validator($request);
        $res = SchemaHelper::insertOrUpdate($this->table, $rec, [$field => $uk]);
        return FormatHelper::asJsonResponse(is_int($res), $res, $res);
    }

    public function search(string $table, string $field, string $value)
    {
        $field = str_replace('-', '_', $field);
        $res = SchemaHelper::select($this->table, [$field => $value]);
        return FormatHelper::asJsonResponse(is_array($res), $res, $res);
    }
}
