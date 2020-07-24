<?php

namespace InSales\Tests;

use InSales\API\ApiResponse;
use PHPUnit_Framework_TestCase;

class ApiResponseTest extends PHPUnit_Framework_TestCase
{
    public function testInitialize() {
        $httpCode = 1;
        $responseBody = 'some text';
        $response = new ApiResponse($httpCode, $responseBody);
        $this->assertEquals($response->getHttpCode(), $httpCode);
        $this->assertEquals($response->getData(), $responseBody);

    }
}