<?php

namespace App\Http\Controllers\Review;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataProvider\RegisterReviewProviderInterface;
use Carbon\Carbon;
use Illuminate\Http\Response;

class RegisterAction extends Controller
{
    private $provider;

    public function __construct(RegisterReviewProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function __invoke(Request $request)
    {
        $this->provider->registerReview(
            $request->get('title'),
            $request->get('content'),
            $request->get('user_id', 1),
            Carbon::now()->toDateTimeString(),
            $request->get('tags')
        );

        return response('', Response::HTTP_OK);
    }
}
