<?php

namespace Tests\Unit;

use App\Services\SearchService;
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
    public function test_operator_of_service(): void
    {
        $key = 'and';
        $service = new SearchService();
        $result = $service->searchOperandTranslator($key);
        $this->assertEquals('must', $result);
        $this->assertTrue(is_string($result));
    }
}
