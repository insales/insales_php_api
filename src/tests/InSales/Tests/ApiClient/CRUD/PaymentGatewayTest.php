<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class PaymentGatewayTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createPaymentGateway(
            [
                'payment_gateway' => [
                    'title' => uniqid(),
                    'type' => 'PaymentGateway::Cod',
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updatePaymentGateway($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removePaymentGateway($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}