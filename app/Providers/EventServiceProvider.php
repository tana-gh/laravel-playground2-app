<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\PublishProcessor;
use App\Listeners\MessageSubscriber;
use App\Listeners\MessageQueueSubscriber;
use App\Events\ReviewRegistered;
use App\Listeners\ReviewIndexCreator;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        PublishProcessor::class => [
            MessageSubscriber::class,
            MessageQueueSubscriber::class,
        ],

        ReviewRegistered::class => [
            ReviewIndexCreator::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
