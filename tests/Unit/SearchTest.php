<?php

namespace Tests\Unit;

use App\Http\Controllers\SearchController;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\SearchCollection;
use App\Models\Article;
use App\Services\SearchService;
use Mockery;
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
//    public function test_can_do_search_on_articles(): void
//    {
//        $request = new SearchRequest();
//        $request->initialize([
//            'params' => ['article_title' => 'search-something',],
//            'operation' => 'and'
//        ]);
//
//        $expectedArray = [
//            'must' => [
//                ['match' => ['title' => ['query' => 'dvcdvdsvd']]],
//                ['match' => ['title' => ['query' => 'dvcdvdsvd']]],
//                ['match' => ['title' => ['query' => 'dvcdvdsvd']]],
//            ],
//            'filter' => [['range' => ['created_at' => [['gt' => ''], ['lt' => '']]]]]
//        ];
//
//        $mock = \Mockery::mock(SearchService::class);
//        $mock->shouldReceive('searchBoolBuilder')
//            ->once()
//            ->withArgs([$request])
//            ->andReturn($expectedArray);
//
//        $controller = new SearchController($mock);
//        $result = $controller->search($request);
//
//        // mocking hard dependencies and static functions
////        $mockedArticle = Mockery::mock('alias:' . Article::class);
////        $mockedArticle->shouldReceive('complexSearch')
////            ->once()
////            ->withAnyArgs()
////            ->andReturn(collect());
//
//        $this->assertInstanceOf(SearchCollection::class, $result);
//    }

    public function test_operator_of_service(): void
    {
        $key = 'and';
        $service = new SearchService();
        $result = $service->searchOperandTranslator($key);
        $this->assertEquals('must', $result);
        $this->assertTrue(is_string($result));
    }
}
