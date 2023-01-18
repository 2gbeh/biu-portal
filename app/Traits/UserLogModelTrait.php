<?php
declare (strict_types = 1);

namespace App\Traits;

use Laravel\Sanctum\HasApiTokens;

trait UserLogModelTrait
{

    public function checkLog(object $event): bool
    {
        $request = $event->data[0];
        $last = $event->data[3];

        return $request->ip() == $last['ip'] &&
        $request->method() == $last['request'] &&
        $request->fullUrl() == $last['route'] &&
        date('Y-m-d') == substr($last['created_at'], 0, 10);

    }

    public function createLog(object $event): void
    {
        // user_id, action, ip, request, route(path), method, user_agent(os)
        $request = $event->data[0];
        $route = $event->data[1];
        $action = $event->data[2];

        $req = [
            'user_id' => $request->user()->id ?? 0,
            'action' => $action,
            'ip' => $request->ip(),
            'request' => $request->method(),
            'route' => $request->fullUrl(),
            'method' => $route->getActionMethod(),
            'notes' => $request->header('User-Agent'),
        ];

        self::create($req);
    }

}
