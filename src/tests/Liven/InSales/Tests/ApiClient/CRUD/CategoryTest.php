<?php

namespace Liven\InSales\Tests\ApiClient\CRUD;

use Liven\InSales\API\ApiResponse;
use Liven\InSales\TestCase;

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
        $response = $client->updateCategory($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeCategory($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}