<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class WebhookTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createWebhook(
            [
                'webhook' => [
                    'address' => 'http://example.com/webhook',
                    'topic' => 'orders/update',
                    'format_type' => 'json',
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateWebhook($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeWebhook($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}