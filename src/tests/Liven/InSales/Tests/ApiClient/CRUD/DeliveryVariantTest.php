<?php

namespace Liven\InSales\Tests\ApiClient\CRUD;

use Liven\InSales\API\ApiResponse;
use Liven\InSales\TestCase;

class DeliveryVariantTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createDeliveryVariant(
            [
                'delivery_variant' => [
                    'title' => 'custom',
                    'type' => 'DeliveryVariant::Fixed',
                    'price' => 1,
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateDeliveryVariant($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeDeliveryVariant($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}