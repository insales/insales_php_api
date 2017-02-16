<?php

namespace Liven\InSales\Tests\ApiClient\CRUD;

use Liven\InSales\API\ApiClient;
use Liven\InSales\API\ApiResponse;
use Liven\InSales\TestCase;

class OrderTest extends TestCase
{
    private $productId;
    private $variantId;
    private $deliveryId;
    private $paymentId;

    public function testTest()
    {
        $client = $this->getApiClient(true);
        $variantId = $this->createVariant($client);
        $deliveryVariantId = $this->createDelivery($client);
        $paymentId = $this->createPayment($client);
        /** @var ApiResponse $response */
        $response = $client->createOrder(
            [
                'order' => [
                    'order_lines_attributes' => [
                        [
                            'variant_id' => $variantId,
                            "quantity" => 2
                        ]
                    ],
                    'client' => [
                        'name' => 'Vasya',
                        'email' => 'vasya@example.com',
                        "phone" => "79111112233"

                    ],
                    'shipping_address_attributes' => [
                        "address" => "Moscow, Krasnaya Presna 24"
                    ],
                    'delivery_variant_id' => $deliveryVariantId,
                    'payment_gateway_id' => $paymentId,
                ]
            ]
        );
        $methods = [200, 201];
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $id = $response->getData()['id'];
        $response = $client->updateOrder($id, []);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeOrder($id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $this->clear($client);
    }

    private function createVariant(ApiClient $client)
    {
        $categoryId = $client->getCategories()->getData()[0]['id'];
        $productId = $client->createProduct([
            'product' => [
                'category_id' => $categoryId,
                'title' => uniqid(),
                'variants_attributes' => [
                    [
                        'price' => 100
                    ]
                ],
            ]
        ])->getData()['id'];
        $this->assertNotNull($productId);
        $this->productId = $productId;
        $variantId = $client->getVariants($productId)->getData()[0]['id'];
        $this->assertNotNull($variantId);
        $this->variantId = $variantId;
        return $variantId;
    }

    private function createDelivery(ApiClient $client)
    {
        $deliveryId = $client->createDeliveryVariant([
            'delivery_variant' => [
                'title' => uniqid(),
                'type' => 'DeliveryVariant::Fixed',
                'price' => 1

            ]
        ])->getData()['id'];
        $this->assertNotNull($deliveryId);
        $this->deliveryId = $deliveryId;
        return $deliveryId;
    }

    private function createPayment(ApiClient $client)
    {
        $apiResponse = $client->createPaymentGateway([
            'payment_gateway' => [
                'title' => uniqid(),
                'type' => 'PaymentGateway::Cod',
                'price' => 1

            ]
        ]);
        $paymentId = $apiResponse->getData()['id'];
        $this->assertNotNull($paymentId);
        $this->paymentId = $paymentId;
        return $paymentId;
    }

    private function clear(ApiClient $client)
    {
        $client->removePaymentGateway($this->paymentId);
        $client->removeDeliveryVariant($this->deliveryId);
        $client->removeVariant($this->variantId, $this->productId);
        $client->removeProduct($this->productId);
    }
}