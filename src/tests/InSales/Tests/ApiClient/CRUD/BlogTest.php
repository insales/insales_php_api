<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class BlogTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createBlog(
            [
                'blog' => [
                    'title' => uniqid(),
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateBlog($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->createArticle(
            $id,
            [
                'article' => [
                    'title' => uniqid(),
                    'content' => uniqid(),
                    'author' => uniqid(),
                ]
            ]
        );
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $articleId = $response->getData()['id'];
        $response = $client->updateArticle($articleId, $id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeArticle($articleId, $id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeBlog($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }
}