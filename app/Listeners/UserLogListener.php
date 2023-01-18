<?php

namespace App\Listeners;

use App\Models\UserLog;

class UserLogListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(object $event)
    {
        return 1;
        $res = UserLog::latest_();

        $userLog = new UserLog;

        if (is_null($res)) {
            $userLog->createLog($event);
        } else {
            array_push($event->data, $res->toArray());

            if ($userLog->checkLog($event)) {
                return 1;
            } else {
                UserLog::createLog($event);
            }
        }

    }
}
