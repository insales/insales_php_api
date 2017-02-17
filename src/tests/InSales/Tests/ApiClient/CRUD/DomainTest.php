<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class DomainTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createDomain(
            [
                'domain' => [
                    'domain' => 'test.te',
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateDomain($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeDomain($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}