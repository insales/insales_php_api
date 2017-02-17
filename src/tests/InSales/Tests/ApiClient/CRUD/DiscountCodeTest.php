<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class DiscountCodeTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createDiscountCode(
            [
                'discount_code' => [
                    'code' => 'custom',
                    'type_id' => 2,
                    'discount' => 1,
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateDiscountCode($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeDiscountCode($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}