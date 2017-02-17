<?php

namespace InSales;

use InSales\API\ApiClient;
use InSales\API\ApiResponse;
use ReflectionMethod;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public static function getApiClient($isValid = true) {
        if ($isValid) {
            $api = new ApiClient($_SERVER['identity'], $_SERVER['password'], $_SERVER['host_name']);
        } else {
            $api = new ApiClient('some_id', 'some_password', 'some host');
        }
        return $api;
    }

    public static function getUnAccessApiClient() {
        return new ApiClient($_SERVER['identity'], $_SERVER['password'] . 'some', $_SERVER['host_name']);
    }

    public function removeAllApplicationWidgets(){
        $client = self::getApiClient(true);
        foreach ($client->getApplicationWidgets()->getData() as $widget){
            $client->removeApplicationWidget($widget['id']);
        }
    }

    public function removeAllBlogs()
    {
        $client = self::getApiClient(true);
        foreach ($client->getBlogs()->getData() as $blog){
            $client->removeBlog($blog['id']);
        }
    }

    public function removeAllClients()
    {
        $httpClient = self::getApiClient(true);
        foreach ($httpClient->getClients()->getData() as $client){
            $httpClient->removeClient($client['id']);
        }
    }

    public function removeAllClientGroups()
    {
        $httpClient = self::getApiClient(true);
        foreach ($httpClient->getClientGroups()->getData() as $client){
            $httpClient->removeClientGroup($client['id']);
        }
    }

    public function removeAllCategories()
    {
        $client = self::getApiClient(true);
        foreach ($client->getCategories()->getData() as $category){
            $client->removeCategory($category['id']);
        }
    }

    public function removeAllProperties()
    {
        $client = self::getApiClient(true);
        foreach ($client->getProperties()->getData() as $data){
            $client->removeProperty($data['id']);
        }
    }

    public function createSimpleBlogForTest():int
    {
        $client = $this->getApiClient(true);
        $response = $client->createBlog(['title' => uniqid()]);
        if (!$response->isSuccessful()){
            throw new \RuntimeException('Не создался блог');
        }
        return (int) $response->getData()['id'];
    }

    public function createSimplePropertyForTest() : int
    {
        $client = $this->getApiClient(true);
        $response = $client->createProperty(['property' => ['title' => uniqid()]]);
        if (!$response->isSuccessful()){
            throw new \RuntimeException('Не создался Параметр(' . $response->getMessage() . ')');
        }
        return (int) $response->getData()['id'];
    }

    public function assertNotFound(ApiResponse $response)
    {
        $this->assertEquals(404, $response->getHttpCode());
    }


    public function getRemoveMethods($paramsCount = 1)
    {
        $client = $this->getApiClient(false);
        $reflection = new \ReflectionObject($client);
        $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);
        $methods = array_filter(
            $methods,
            function(ReflectionMethod $method) use ($paramsCount){
                return
                    substr($method->getName(), 0, 6) == 'remove' &&
                    count($method->getParameters()) == $paramsCount;
            }
            );
        $methods = array_map(function(ReflectionMethod $method){return $method->getName();}, $methods);

        return $methods;
    }

    public function getListMethods()
    {
        $client = $this->getApiClient(false);
        $reflection = new \ReflectionObject($client);
        $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);
        $methods = array_filter(
            $methods,
            function(ReflectionMethod $method){
                $name = $method->getName();
                return
                    substr($name, -1, 1) == 's' &&
                    count($method->getParameters()) == 0;
            }
        );
        $methods = array_map(function(ReflectionMethod $method){return $method->getName();}, $methods);

        return $methods;
    }

    public function getGetMethods()
    {
        $client = $this->getApiClient(false);
        $reflection = new \ReflectionObject($client);
        $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);
        $methods = array_filter(
            $methods,
            function(ReflectionMethod $method){
                $name = $method->getName();
                return
                    substr($name, 0, 3) == 'get' &&
                    substr($name, -1, 1) != 's' &&
                    count($method->getParameters()) == 1;
            }
        );
        $methods = array_map(function(ReflectionMethod $method){return $method->getName();}, $methods);
        return $methods;
    }

    public function getUpdateMethods()
    {
        $client = $this->getApiClient(false);
        $reflection = new \ReflectionObject($client);
        $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);
        $methods = array_filter(
            $methods,
            function(ReflectionMethod $method){
                $name = $method->getName();
                return
                    substr($name, 0, 6) == 'update' &&
                    substr($name, -1, 1) != 's' &&
                    count($method->getParameters()) == 2;
            }
        );
        $methods = array_map(function(ReflectionMethod $method){return $method->getName();}, $methods);
        return $methods;
    }

    public function getRemoveMethodsArrayProvider()
    {
        $methods = $this->getRemoveMethods();
        $data = [];
        foreach ($methods as $method){
            $data[] = [$method];
        }
        return $data;
    }

    public function getListMethodsArrayProvider()
    {
        $methods = $this->getListMethods();
        $data = [];
        foreach ($methods as $method){
            $data[] = [$method];
        }
        return $data;
    }

    public function getGetMethodsArrayProvider()
    {
        $methods = $this->getGetMethods();
        $data = [];
        foreach ($methods as $method){
            $data[] = [$method];
        }
        return $data;
    }

    public function getUpdateMethodsArrayProvider()
    {
        $methods = $this->getUpdateMethods();
        $data = [];
        foreach ($methods as $method){
            $data[] = [$method];
        }
        return $data;
    }
}
