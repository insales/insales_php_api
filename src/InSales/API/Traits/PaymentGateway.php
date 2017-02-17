<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait PaymentGateway Часть API-клиента, отвечающая за типы оплаты
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait PaymentGateway {
    /**
     * Создание способа оплаты
     * @param array $paymentGateway
     * @return ApiResponse Созданный тип доставки
     */
    public function createPaymentGateway(array $paymentGateway) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_PAYMENT_GATEWAYS),
            $paymentGateway
        );
    }

    /**
     * Удаление способа оплаты
     * @param integer $id Идентификатор способа оплаты
     * @return ApiResponse Результат удаления
     */
    public function removePaymentGateway(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_PAYMENT_GATEWAYS, $id),
            $id
        );
    }

    /**
     * Получение списка типов оплат
     * @return ApiResponse
     */
    public function getPaymentGateways() : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_PAYMENT_GATEWAYS)
        );
    }

    /**
     * Обновление типа оплаты
     * @param $id
     * @param array $paymentGateway
     * @return ApiResponse
     */
    public function updatePaymentGateway(int $id, array $paymentGateway) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_PAYMENT_GATEWAYS, $id),
            $paymentGateway
        );
    }

}