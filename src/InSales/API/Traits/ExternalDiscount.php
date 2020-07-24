<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait ExternalDiscount Часть API-клиента, отвечающая за внешние скидки
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait ExternalDiscount {
    /**
     * Создание внешей скидки
     * @param array $data
     * @return ApiResponse
     */
    public function createExternalDiscount(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_EXTERNAL_DISCOUNT),
            $data
        );
    }

    /**
     * Удаление внешей скидки
     * @param int $id
     * @return ApiResponse
     */
    public function removeExternalDiscount(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_EXTERNAL_DISCOUNT, $id),
            $id
        );
    }

    /**
     * Получение внешей скидки
     * @param int $id
     * @return ApiResponse
     */
    public function getExternalDiscount(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_EXTERNAL_DISCOUNT, $id),
            $id
        );
    }

    /**
     * Получение списка внеших скидок
     * @return ApiResponse
     */
    public function getExternalDiscounts() : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_EXTERNAL_DISCOUNT)
        );
    }

    /**
     * Обновление внешей скидки
     * @param int $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateExternalDiscount(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_EXTERNAL_DISCOUNT, $id),
            $data
        );
    }
}
