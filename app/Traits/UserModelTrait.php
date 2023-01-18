<?php
declare (strict_types = 1);

namespace App\Traits;

use App\Events\SignInEvent;
use App\Events\SignOutEvent;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

trait UserModelTrait
{

    public function mock($f = null)
    {
        $json = file_get_contents(database_path('mocks/users.json'));
        $data = json_decode($json);
        $list = [];

        if ($f === '#') {
            return count($data);
        } else if (is_int($f)) {
            // limit = 1024
            shuffle($data);
            return array_slice($data, 0, $f);
        } else if (is_float($f)) {
            // limit, offset = 25,25
            $f .= '';
            $offset = (int) explode('.', $f)[0];
            $limit = (int) explode('.', $f)[1];
            shuffle($data);
            return array_slice($data, $offset, $limit);
        } else if (is_string($f)) {
            // datalist = email
            foreach ($data as $row) {
                array_push($list, $row->$f);
            }

            return $list;
        } else if (is_array($f)) {
            // where = ['email' => 'webmaster@test.com']
            $key = array_keys($f)[0];
            $key_ = substr($key, 0, 1) == '#' ? substr($key, 1) : $key;
            $value = array_values($f)[0];

            foreach ($data as $row) {
                if (strtolower($row->$key_) == strtolower($value)) {
                    array_push($list, $row);
                }
            }

            return substr($key, 0, 1) == '#' ? count($list) : $list;
        } else {
            return $data;
        }
    }

    public function uuid()
    {
        return (string) Str::orderedUuid();
    }

    public function password(string $password = 'password', string $hashed = null)
    {
        if ($hashed === null) {
            return Hash::make($password);
        } else {
            return Hash::check($password, $hashed);
        }
    }

    public function watch(Request $request, Route $route)
    {
        event(new SignInEvent([$request, $route]));

        if (Auth::check()) {
            $user = Auth::user();
            $request->session()->put('MENU', $user->userRolesView());
            $request->session()->put('WHO', $user->first_name);
            $request->session()->put('ID', $user->id);
        }
    }

    public function unwatch(Request $request, Route $route)
    {
        event(new SignOutEvent([$request, $route]));

        $request->session()->forget(['MENU', 'WHO', 'ID']);
    }

    public function userRolesView(bool $raw = false)
    {
        $id = $this->id;

        $query = "SELECT
            privilege_gates.id AS gate_id,
            privilege_gates.gate,
            privilege_gates.route AS gate_route,
            privilege_gates.icon AS gate_icon,
            privilege_gates.badge AS gate_badge,

            privilege_policies.id AS policy_id,
            privilege_policies.policy,
            privilege_policies.route AS policy_route,
            privilege_policies.icon AS policy_icon

            FROM privilege_gates
            LEFT JOIN privilege_policies
            ON privilege_gates.privilege_policy_id = privilege_policies.id";

        if ($id > 1) {
            $query .= " WHERE privilege_gates.id IN (
                SELECT privilege_gate_id FROM privilege_permissions WHERE privilege_role_id IN
                (SELECT privilege_role_id FROM user_roles WHERE user_id = {$id})
            )";
        }

        try {
            $res = DB::select($query);
            return $raw == true ? $res : $this->userRolesMenu($res);
        } catch (QueryException $err) {
            return self::queryException($err);
        }
    }

    public function userRolesMenu(array $res): array
    {
        $list = [];

        foreach ($res as $row) {
            $p = $row->policy;
            $pr = $row->policy_route ?? '#!';
            $pi = $row->policy_icon;
            $pt = strpos($pr, 'http') !== false ? '_new' : '';

            $g = $row->gate;
            $gr = $row->gate_route ?? '#!';
            $gi = $row->gate_icon;
            $gt = strpos($gr, 'http') !== false ? '_new' : '';
            $gb = [];
            $badge = $row->gate_badge;

            if (isset($badge)) {
                $val = $row->gate_badge;
                if (substr($badge, 0, 1) === '#') {
                    $table = substr($badge, 1);
                    if (Schema::hasTable($table)) {
                        $n = DB::table($table)->count();
                        $gb = ['color' => 'danger', 'text' => number_format($n)];
                    }
                } else {
                    $gb = ['color' => 'success', 'text' => $badge];
                }
            }

            $menu = [
                'a' => [],
                'b' => [],
                'i' => $pi ?? 'fi fi-rs-folder',
                'dt' => $p ? ucwords($p) : null,
                'dd' => [],
            ];

            $menu_item = [
                'a' => ['href' => $gr, 'target' => $gt],
                'b' => $gb,
                'i' => $gi ?? 'fi fi-rs-file',
                'dt' => $g ? ucwords($g) : null,
                'dd' => [],
            ];

            if (is_null($row->policy_id)) {
                $list[$g] = $menu_item;
            } else {
                if (!array_key_exists($p, $list)) {
                    $list[$p] = $menu;
                }

                $list[$p]['dd'][] = $menu_item;
            }
        }

        return $list;
    }

}
