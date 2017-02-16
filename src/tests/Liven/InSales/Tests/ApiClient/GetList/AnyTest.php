<?php

namespace Liven\InSales\Tests\ApiClient\GetList;

use Liven\InSales\API\ApiResponse;
use Liven\InSales\TestCase;

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