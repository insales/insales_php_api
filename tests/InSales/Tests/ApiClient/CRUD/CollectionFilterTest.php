<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class CollectionFilterTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        $collectionId = $client->getCollections()->getData()[0]['id'];
        /** @var ApiResponse $response */
        $response = $client->createCollectionFilter(
            [
                'filter' => [
                    'title' => uniqid(),
                    'collection_id' => $collectionId,
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateCollectionFilter($id, ['filter' => ['id' => $id]]);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeCollectionFilter($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}