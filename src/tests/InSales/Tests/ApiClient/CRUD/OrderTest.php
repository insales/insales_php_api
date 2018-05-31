<?php

namespace InSales\Tests\ApiClient\CRUD;

use InSales\API\ApiClient;
use InSales\API\ApiResponse;
use InSales\Http\Client;
use InSales\TestCase;

class OrderTest extends TestCase
{
    private $productId;
    private $variantId;
    private $deliveryId;
    private $paymentId;
    private $paymentShopId;
    private $paymentPassword;

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
        $key = $response->getData()['key'];
        $this->createTransaction($key);
        $response = $client->getOrderById($id);
        $transactionId = $response->getData()['client_transaction_id'];
        $this->notify($client, 0, $response->getData()['total_price'], $key, $transactionId);
        $this->notify($client, 1, $response->getData()['total_price'], $key, $transactionId);
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
        $this->paymentShopId = uniqid();
        $apiResponse = $client->createPaymentGateway([
            'payment_gateway' => [
                'title' => uniqid(),
                'type' => 'PaymentGateway::External',
                'url' => 'http://example.com',
                'price' => 1,
                'shop_id' => $this->paymentShopId

            ]
        ]);
        $paymentId = $apiResponse->getData()['id'];
        $this->assertNotNull($paymentId);
        $this->paymentPassword = $apiResponse->getData()['password'];
        $this->paymentId = $paymentId;
        return $paymentId;
    }

    private function createTransaction(string $key)
    {
        $methods = [200, 201];
        $httpClient = new Client($_SERVER['identity'], $_SERVER['password'], $_SERVER['host_name']);
        $response = $httpClient->request(
            Client::METHOD_GET,
            $_SERVER['host_name']."/payments/external/{$this->paymentId}/create",
            http_build_query(['key' => $key])
        );
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
    }

    private function notify(ApiClient $client, $isPaid, $amount, $key, $transactionId)
    {
        $signature = md5(join(';', [
            $this->paymentShopId,
            $amount,
            $transactionId,
            $key,
            $isPaid,
            $this->paymentPassword
        ]));

        $data = [
            'paid'           => $isPaid,
            'amount'         => $amount,
            'transaction_id' => $transactionId,
            'key'            => $key,
            'shop_id'        => $this->paymentShopId,
            'signature'      => $signature
        ];

        $methods = [200, 201];
        $response = $client->paymentNotify($data);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $this->assertEquals('ok', $response->getData()['status']);
    }

    private function clear(ApiClient $client)
    {
        $client->removePaymentGateway($this->paymentId);
        $client->removeDeliveryVariant($this->deliveryId);
        $client->removeVariant($this->variantId, $this->productId);
        $client->removeProduct($this->productId);
    }
}