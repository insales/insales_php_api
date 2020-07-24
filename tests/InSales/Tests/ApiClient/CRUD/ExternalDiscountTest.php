<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class ExternalDiscountTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createExternalDiscount(
            [
                'external_discount' => [
                    'description' => 'custom',
                    'url' => 'custom',
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateExternalDiscount($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeExternalDiscount($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}
