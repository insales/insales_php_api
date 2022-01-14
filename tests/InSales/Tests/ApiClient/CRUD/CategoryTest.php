<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class CategoryTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createCategory(
            [
                'category' => [
                    'title' => uniqid(),
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateCategory($id, [
            'category' => [
                'title' => uniqid(),
            ]
        ]);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeCategory($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}