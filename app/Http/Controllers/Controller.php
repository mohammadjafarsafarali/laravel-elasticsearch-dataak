<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Throwable;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param string $message
     * @param null $data
     * @return JsonResponse
     * @author mj.safarali
     */
    protected function successResponse(string $message = 'ok', $data = null): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'error' => null,
            'value' => $data
        ]);
    }

    /**
     * @param Throwable $exception
     * @return JsonResponse
     * @author mj.safarali
     */
    protected function failureResponse(Throwable $exception): JsonResponse
    {
        return response()->json([
            'status' => 'failed',
            'error' => $exception->getCode(),
            'message' => $exception->getMessage(),
            'value' => app()->environment('production') ? [] : $exception->getTrace()
        ]);
    }
}
