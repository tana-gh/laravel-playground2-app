<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Bus\Queueable;

class PublishProcessor
{
    //use Dispatchable, InteractsWithSockets, SerializesModels;

    private $int;

    public function __construct(int $int)
    {
        $this->int = $int;
    }

    public function getInt()
    {
        return $this->int;
    }
}
