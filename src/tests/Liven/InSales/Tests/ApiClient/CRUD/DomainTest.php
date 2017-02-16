<?php

namespace Liven\InSales\Tests\ApiClient\CRUD;

use Liven\InSales\API\ApiResponse;
use Liven\InSales\TestCase;

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