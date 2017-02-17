<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class OptionValueTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        $optionNameId = $client->createOptionName(
            [
                'option_name' => [
                    'title' => uniqid(),
                ]
            ]
        )->getData()['id'];
        /** @var ApiResponse $response */
        $response = $client->createOptionValue(
            $optionNameId,
            [
                'option_value' => [
                    'title' => uniqid(),
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateOptionValue($id, $optionNameId, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeOptionValue($id, $optionNameId);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeOptionName($optionNameId);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}