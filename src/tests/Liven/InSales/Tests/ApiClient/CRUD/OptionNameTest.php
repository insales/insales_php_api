<?php

namespace Liven\InSales\Tests\ApiClient\CRUD;

use Liven\InSales\API\ApiResponse;
use Liven\InSales\TestCase;

class OptionNameTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createOptionName(
            [
                'option_name' => [
                    'title' => uniqid(),
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateOptionName($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeOptionName($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}