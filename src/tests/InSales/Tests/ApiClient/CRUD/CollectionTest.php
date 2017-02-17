<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class CollectionTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        $parentId = $client->getCollections()->getData()[0]['id'];
        /** @var ApiResponse $response */
        $response = $client->createCollection(
            [
                'collection' => [
                    'title' => uniqid(),
                    'parent_id' => $parentId,
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateCollection($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeCollection($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}