<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiResponse;
use InSales\TestCase;

class RecurringApplicationChargeTest extends TestCase
{
    const ONE_DAY_SECONDS = 86400;

    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createRecurringCharge(
            [
                'recurring_application_charge' => [
                    'monthly' => 1,
                    "trial_expired_at" => date('Y-m-d', time() + self::ONE_DAY_SECONDS)
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));

        try {
            $response = $client->updateRecurringCharge(
                [
                    'recurring_application_charge' => [
                        'monthly' => 2
                    ]
                ]
            );
            $this->assertTrue(in_array($response->getHttpCode(), $methods));

            $response = $client->getRecurringCharge();
            $this->assertTrue(in_array($response->getHttpCode(), $methods));

            $response = $client->addFreeDays(
                [
                    'recurring_application_charge' => [
                        'days_count' => 21
                    ]
                ]
            );
            $this->assertTrue(in_array($response->getHttpCode(), $methods));
        } finally {
            $response = $client->destroyRecurringCharge();
            $this->assertTrue(in_array($response->getHttpCode(), $methods));
        }
    }
}