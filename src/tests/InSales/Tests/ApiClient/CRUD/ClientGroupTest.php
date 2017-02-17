<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class ClientGroupTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createClientGroup(
            [
                'client_group' => [
                    'title' => uniqid(),
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateClientGroup($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeClientGroup($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}