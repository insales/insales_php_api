<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

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