<?php

namespace App\Http\Controllers;

use App\Http\Resources\SearchCollection;
use App\Http\Requests\SearchRequest;
use App\Models\Article;
use App\Services\SearchService;

class SearchController extends Controller
{
    /**
     * @var SearchService
     */
    private $searchService;

    /**
     * SearchController constructor.
     * @param SearchService $searchService
     */
    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    /**
     * @param SearchRequest $request
     * @return SearchCollection
     * @author mj.safarali
     */
        public function search(SearchRequest $request): SearchCollection
    {
        $searchArr = ["body" => ["query" => ["bool" => $this->searchService->searchBoolBuilder($request)]]];
        $articles = Article::complexSearch($searchArr);
        return new SearchCollection($articles->toArray());
    }
}
