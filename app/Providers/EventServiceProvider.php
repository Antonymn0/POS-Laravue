<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        // user events
        'App\Events\UserCreated' => [
            //
        ],
        'App\Events\UserUpdated' => [
            //
        ],
        'App\Events\UserDestroyed' => [
            //
        ],

        // product events
        'App\Events\ProductCreated' => [
            //
        ],
        'App\Events\ProductUpdated' => [
            //
        ],
        'App\Events\ProductDestroyed' => [
            //
        ],

        // Media events
        'App\Events\MediaCreated' => [
            //
        ],
        'App\Events\MediaUpdated' => [
            //
        ],
        'App\Events\MediaDestroyed' => [
            //
        ],

        // Shift events
        'App\Events\ShiftCreated' => [
            //
        ],
        'App\Events\ShiftUpdated' => [
            //
        ],
        'App\Events\ShiftDestroyed' => [
            //
        ],

        // Products events
        'App\Events\OrderCreated' => [
            //
        ],
        'App\Events\OrderUpdated' => [
            //
        ],
        'App\Events\OrderDestroyed' => [
            //
        ],

        // Order Products events
        'App\Events\OrderProductsCreated' => [
            //
        ],
        'App\Events\OrderProductsUpdated' => [
            //
        ],
        'App\Events\OrderProductsDestroyed' => [
            //
        ],

        // Payment events
        'App\Events\PaymentCreated' => [
            //
        ],
        'App\Events\PaymentUpdated' => [
            //
        ],
        'App\Events\PaymentDestroyed' => [
            //
        ],

        // Login event
        'App\Events\LoginSuccessful' => [
            //
        ],

        // Logout event
        'App\Events\LogoutSuccessful' => [
            //
        ]
        

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
