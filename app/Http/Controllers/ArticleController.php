<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use App\Services\ArticleService;
use Throwable;

class ArticleController extends Controller
{
    /**
     * @var ArticleService
     */
    private $articleService;

    /**
     * ArticleController constructor.
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return JsonResponse
     */
    public function store(ArticleRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $article = $this->articleService->create($request);
            DB::commit();
            return $this->successResponse(
                trans('messages.ok'),
                new ArticleResource($article)
            );
        } catch (Throwable $exception) {
            DB::rollBack();
            return $this->failureResponse($exception);
        }
    }

}
