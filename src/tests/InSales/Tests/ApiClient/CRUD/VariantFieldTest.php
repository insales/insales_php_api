<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class VariantFieldTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createVariantField(
            [
                'variant_field' => [
                    'title' => uniqid(),
                    'handle' => 'size',
                    'type' => 'VariantField::TextField',
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateVariantField($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeVariantField($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}