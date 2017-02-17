<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait DiscountCode Часть API-клиента, отвечающая за скидочные купоны
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait DiscountCode {
    /**
     * Создание кода скидки
     * @param array $data
     * @return ApiResponse
     */
    public function createDiscountCode(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_DISCOUNT_CODES),
            $data
        );
    }

    /**
     * Удаление кода скидки
     * @param int $id
     * @return ApiResponse
     */
    public function removeDiscountCode(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_DISCOUNT_CODES, $id),
            $id
        );
    }

    /**
     * Получение кода скидки
     * @param int $id
     * @return ApiResponse
     */
    public function getDiscountCode(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_DISCOUNT_CODES, $id),
            $id
        );
    }

    /**
     * Получение списка кодов скидок
     * @return ApiResponse
     */
    public function getDiscountCodes() : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_DISCOUNT_CODES)
        );
    }

    /**
     * Обновление кода скидок
     * @param int $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateDiscountCode(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_DISCOUNT_CODES, $id),
            $data
        );
    }
}