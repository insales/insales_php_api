<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class ClientTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createClient(
            [
                'client' => [
                    'name' => uniqid(),
                    'surname' => uniqid(),
                    'middlename' => uniqid(),
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateClient($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeClient($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}