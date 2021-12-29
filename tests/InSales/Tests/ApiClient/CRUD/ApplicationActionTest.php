<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class ApplicationActionTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createAction(
            [
                'application_action' => [
                    'title' => uniqid(),
                    'handle' => uniqid(),
                    "entity" => "product",
                    "url" => "http://www.yandex.ru"
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));

        $id = $response->getData()['id'];

        $response = $client->updateAction($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));

        $response = $client->getActions();
        $this->assertTrue(in_array($response->getHttpCode(), $methods));

        $response = $client->getActionById($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));

        $response = $client->destroyAction($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}