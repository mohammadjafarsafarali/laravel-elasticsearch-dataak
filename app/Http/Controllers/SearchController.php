<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Resources\SearchCollection;
use App\Models\Article;
use Carbon\Carbon;

class SearchController extends Controller
{
    const DEFAULT_TIME_SEARCH_COLUMN = 'created_at';

    /**
     * @param SearchRequest $request
     * @return SearchCollection
     * @author mj.safarali
     */
    public function search(SearchRequest $request): SearchCollection
    {

        $searchArr = ["body" => ["query" => ["bool" => $this->searchBoolBuilder($request)]]];

        $articles = Article::complexSearch($searchArr);

        return new SearchCollection($articles->toArray());
    }

    /**
     * @param $request
     * @return array
     * @author mj.safarali
     */
    private function searchBoolBuilder($request): array
    {
        $searchBoolArr = [];
        if ($request->has('params')) {
            $searchBoolArr[] = [$this->searchOperandTranslator($request->operation) => $this->searchParamsBuilder($request)];
        }
        if ($request->has('date')) {
            $searchBoolArr[] = ["filter" => [["range" => [self::DEFAULT_TIME_SEARCH_COLUMN => $this->searchTimesBuilder($request)]]]];
        }
        return array_merge($searchBoolArr[0], $searchBoolArr[1] ?? []);
    }

    /**
     * @param $key
     * @return false|string
     * @author mj.safarali
     */
    private function searchOperandTranslator($key)
    {
        switch ($key) {
            case 'and':
                return 'must';
                break;
            case 'or':
                return 'should';
                break;
            default:
                return false;
        }


    }

    /**
     * @param $request
     * @return array
     * @author mj.safarali
     */
    private function searchParamsBuilder($request): array
    {
        $searchArrayParameter = [];
        foreach ($request->get('params') as $key => $value) {
            $searchArrayParameter[] = ["match" => [$this->searchKeyTranslator($key) => ["query" => $value]]];
        }
        return $searchArrayParameter;
    }

    /**
     * @param $key
     * @return false|string
     * @author mj.safarali
     */
    private function searchKeyTranslator($key)
    {
        switch ($key) {
            case 'article_title':
                return 'title';
                break;
            case 'source_name':
                return 'source.name';
                break;
            case 'user_name':
                return 'user.name';
                break;
            case 'instagram_id':
                return 'user.instagram_id';
                break;
            case 'twitter_id':
                return 'user.twitter_id';
                break;
            default:
                return false;
        }


    }

    /**
     * @param $request
     * @return array
     * @author mj.safarali
     */
    private function searchTimesBuilder($request): array
    {
        $dateArrayParameter = [];
        foreach ($request->get('date') as $param) {
            $dateArrayParameter[$param['operand']] = Carbon::parse($param['value']);
        }

        return $dateArrayParameter;
    }
}
