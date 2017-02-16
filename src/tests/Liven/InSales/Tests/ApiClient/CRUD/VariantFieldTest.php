<?php

namespace Liven\InSales\Tests\ApiClient\CRUD;

use Liven\InSales\API\ApiResponse;
use Liven\InSales\TestCase;

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