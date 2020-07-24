<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class ApplicationWidgetTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createApplicationWidget(
            [
                'application_widget' => [
                    'code' => '<br>',
                    'height' => 1
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateApplicationWidget($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeApplicationWidget($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}