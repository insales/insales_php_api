<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class PropertyTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createProperty(
            [
                'property' => [
                    'title' => uniqid(),
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateProperty($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeProperty($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}