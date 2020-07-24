<?php

namespace InSales\Tests\ApiClient\Client;

use InSales\Http\Client;
use InSales\TestCase;

class ConstructTest extends TestCase
{

    /**
     * @param $identity
     * @param $password
     * @param $hostName
     * @param $expected
     *
     * @dataProvider dataMethod
     */
    public function testMethod($identity, $password, $hostName, $expected)
    {
        $client = new Client($identity, $password, $hostName);

        $this->assertSame($expected['baseUrl'], $client->getBaseUrl());
        $this->assertSame($expected['hostname'], $client->getHostName());
    }

    public function dataMethod()
    {
        return [
            [
                'identity', 'pass', '123.ru',
                ['baseUrl' => 'http://identity:pass@123.ru', 'hostname' => 'http://123.ru']
            ],
            [
                'identity', 'pass', '123.ru:8080',
                ['baseUrl' => 'http://identity:pass@123.ru:8080', 'hostname' => 'http://123.ru:8080']
            ],
            [
                'identity', 'pass', '123.ru:8080/subpath',
                ['baseUrl' => 'http://identity:pass@123.ru:8080/subpath', 'hostname' => 'http://123.ru:8080/subpath']
            ],
            [
                'identity', 'pass', 'https://123.ru',
                ['baseUrl' => 'https://identity:pass@123.ru', 'hostname' => 'https://123.ru']
            ],
            [
                'identity', 'pass', 'http://123.ru',
                ['baseUrl' => 'http://identity:pass@123.ru', 'hostname' => 'http://123.ru']
            ],
        ];
    }
}
