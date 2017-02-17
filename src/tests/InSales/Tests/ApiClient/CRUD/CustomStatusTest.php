<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class CustomStatusTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createCustomStatus(
            [
                'custom_status' => [
                    'system_status' => 'new',
                    'title' => 'custom',
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['permalink'];
        $response = $client->updateCustomStatus($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeCustomStatus($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}