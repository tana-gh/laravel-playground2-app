<?php

namespace App\Listeners;

use App\Events\ReviewRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\DataProvider\AddReviewIndexProviderInterface;

class ReviewIndexCreator implements ShouldQueue
{
    use InteractsWithQueue;

    private $provider;

    public function __construct(AddReviewIndexProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function handle(ReviewRegistered $event)
    {
        $this->provider->addReview(
            $event->getId(),
            $event->getTitle(),
            $event->getContent(),
            $event->getCreatedAtEpoch(),
            $event->getTags(),
            $event->getUserId()
        );
    }
}
