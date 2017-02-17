<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

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