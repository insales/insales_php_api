<?php

namespace InSales\Tests\ApiClient\GetList;

use InSales\API\ApiResponse;
use InSales\TestCase;

class AnyTest extends TestCase
{
    /**
     * @dataProvider getListMethodsArrayProvider
     * @param string $method
     */
    public function testTest(string $method)
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->$method(2);
        $allowedCodes = [200];
        $this->assertTrue(in_array($response->getHttpCode(), $allowedCodes));
        $this->assertTrue(is_array($response->getData()));
    }

}