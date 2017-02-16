<?php

namespace Liven\InSales\Tests\ApiClient\CRUD;

use Liven\InSales\API\ApiResponse;
use Liven\InSales\TestCase;

class AccountTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->getAccount();
        $this->assertEquals(200, $response->getHttpCode());
        $this->assertTrue(is_array($response->getData()));
    }
}