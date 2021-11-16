<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Http\Resources\SubscribeResource;
use App\Services\SubscribeService;
use Illuminate\Http\JsonResponse;
use Throwable;

class SubscribeController extends Controller
{
    /**
     * @var SubscribeService
     */
    private $subscribeService;

    public function __construct(SubscribeService $subscribeService)
    {
        $this->subscribeService = $subscribeService;
    }

    /**
     * @param SubscribeRequest $request
     * @return JsonResponse
     * @author mj.safarali
     */
    public function subscribe(SubscribeRequest $request): JsonResponse
    {
        try {
            $subscribe = $this->subscribeService->subscribe($request);
            return $this->successResponse(
                trans('messages.ok'),
                new SubscribeResource($subscribe)
            );
        } catch (Throwable $exception) {
            return $this->failureResponse($exception);
        }
    }
}
