<?php

namespace Liven\InSales\Tests\ApiClient\CRUD;

use Liven\InSales\API\ApiResponse;
use Liven\InSales\TestCase;

class FieldTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createField(
            [
                'field' => [
                    'type' => 'Field::TextField',
                    'office_title' => uniqid(),
                    'destiny' => 3,
                    'title' => uniqid(),
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateField($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeField($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}