<?php

namespace App\Listeners;

use App\Events\PublishProcessor;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageSubscriber
{
    public function handle(PublishProcessor $event)
    {
        var_dump($event->getInt());
    }
}
