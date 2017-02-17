<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class FileTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createFile(
            [
                'file' => [
                    'src' => 'https://assets3.insales.ru/assets/1/161/647329/v_1467875760/build/slide4.jpg',
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->removeFile($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}