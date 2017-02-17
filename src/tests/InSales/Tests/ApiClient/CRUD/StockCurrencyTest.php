<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class StockCurrencyTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createStockCurrency(
            [
                'stock_currency' => [
                    'code' => 'LVL',
                ]
            ]
        );
        $methods = [200, 201, 404, 422];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        if ($response->getHttpCode() == 201){
            $id = $response->getData()['id'];
            $response = $client->updateStockCurrency($id, []);
            $this->assertTrue(in_array($response->getHttpCode(), $methods));
            $response = $client->removeStockCurrency($id);
            $this->assertTrue(in_array($response->getHttpCode(), $methods));
        }
    }
}