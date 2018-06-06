<?php

namespace InSales\API\Traits;


use InSales\API\ApiResponse;

/**
 * Trait PaymentNotify
 * @package InSales\API\Traits
 * @mixin \InSales\API\ApiClient
 */
trait PaymentNotify
{
    /**
     * Уведомление о результатах оплаты с сервера платежной системы
     * @see https://wiki.insales.ru/wiki/%D0%9F%D0%BE%D0%B4%D0%BA%D0%BB%D1%8E%D1%87%D0%B5%D0%BD%D0%B8%D0%B5_%D0%B2%D0%BD%D0%B5%D1%88%D0%BD%D0%B5%D0%B3%D0%BE_%D1%81%D0%BF%D0%BE%D1%81%D0%BE%D0%B1%D0%B0_%D0%BE%D0%BF%D0%BB%D0%B0%D1%82%D1%8B_(%D0%B4%D0%BB%D1%8F_%D1%80%D0%B0%D0%B7%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D1%87%D0%B8%D0%BA%D0%BE%D0%B2_%D0%B8%D0%BD%D1%82%D0%B5%D0%B3%D1%80%D0%B0%D1%86%D0%B8%D0%B9)
     * @param array $data
     * @return ApiResponse
     */
    public function paymentNotify(array $data) : ApiResponse
    {
        $client = $this->client;
        $response = $client->request(
            $client::METHOD_POST,
            $client->getHostName() . self::PAYMENT_URL_NOTIFY,
            http_build_query($data),
            ['Content-Type: application/x-www-form-urlencoded']
        );
        return $response;
    }
}