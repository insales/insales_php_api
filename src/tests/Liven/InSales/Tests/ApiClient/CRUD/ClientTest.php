<?php

namespace Liven\InSales\Tests\ApiClient\CRUD;

use Liven\InSales\API\ApiResponse;
use Liven\InSales\TestCase;

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