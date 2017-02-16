<?php

namespace Liven\InSales\Tests\ApiClient\CRUD;

use Liven\InSales\API\ApiResponse;
use Liven\InSales\TestCase;

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