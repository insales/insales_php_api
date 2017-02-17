<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class JsTagTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createJsTag(
            [
                'js_tag' => [
                    'type' => 'JsTag::TextTag',
                    'content' => 'console.log(1)',
                    'name' => uniqid(),
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateJsTag($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeJsTag($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}