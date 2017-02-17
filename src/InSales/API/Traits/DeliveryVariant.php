<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait DeliveryVariant Часть API-клиента, отвечающая за способы доставки
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait DeliveryVariant {

    /**
     * Создание типа доставки
     * В случае успешного создания типа доставки возвращает ассоциативный массив созданного типа доставки
     * @param array $data Тип доставки
     * @return \InSales\API\ApiResponse Созданный тип доставки
     */
    public function createDeliveryVariant(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_DELIVERY_VARIANTS),
            $data
        );
    }

    /**
     * Удаление типа доставки
     * @param integer $id Идентификатор типа доставки
     * @return \InSales\API\ApiResponse Результат удаления
     */
    public function removeDeliveryVariant(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_DELIVERY_VARIANTS, $id),
            $id
        );
    }

    /**
     * Получение списка типов доставки
     * @return \InSales\API\ApiResponse
     */
    public function getDeliveryVariants() : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_DELIVERY_VARIANTS));
    }

    /**
     * Получение типа доставки
     * @param int $id
     * @return ApiResponse
     */
    public function getDeliveryVariant(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_DELIVERY_VARIANTS, $id), $id);
    }

    /**
     * Обновление типа доставки
     * @param int $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateDeliveryVariant(int $id, array $data = []) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_DELIVERY_VARIANTS, $id), $data);
    }
}