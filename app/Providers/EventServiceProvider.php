<?php

namespace App\Providers;

use App\Events\DeleteEvent;
use App\Events\InsertEvent;
use App\Events\SelectEvent;
use App\Events\SignInEvent;
use App\Events\SignOutEvent;
use App\Events\SignUpEvent;
use App\Events\UpdateEvent;
use App\Listeners\UserLogListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        //
        SignUpEvent::class => [
            UserLogListener::class,
        ],
        SignInEvent::class => [
            UserLogListener::class,
        ],
        SignOutEvent::class => [
            UserLogListener::class,
        ],
        InsertEvent::class => [
            UserLogListener::class,
        ],
        SelectEvent::class => [
            UserLogListener::class,
        ],
        UpdateEvent::class => [
            UserLogListener::class,
        ],
        DeleteEvent::class => [
            UserLogListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
