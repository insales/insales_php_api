<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class ProductFieldTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createProductField(
            [
                'product_field' => [
                    'title' => uniqid(),
                    'handle' => 'size',
                    'type' => 'ProductField::TextField',
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateProductField($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeProductField($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}