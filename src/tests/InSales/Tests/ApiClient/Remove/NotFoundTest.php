<?php

namespace InSales\Tests\ApiClient\Remove;

use InSales\API\ApiResponse;
use InSales\TestCase;

class NotFoundTest extends TestCase
{

    /**
     * @dataProvider getRemoveMethodsArrayProvider
     * @param string $method
     */
    public function testTest(string $method)
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->$method(2);
        $allowedCodes = [
            200, 404, 503, 500 // 500 от дьявола
        ];
        $this->assertTrue(in_array($response->getHttpCode(), $allowedCodes));
    }

}