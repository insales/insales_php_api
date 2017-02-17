<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait ProductField Часть API-клиента, отвечающая за поля товаров
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait ProductField
{
    /**
     * Создание поля товара
     * @param array $data
     * @return ApiResponse
     */
    public function createProductField(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_PRODUCT_FIELD),
            $data
        );
    }

    /**
     * Удалить поле товара
     * @param int $id
     * @return ApiResponse
     */
    public function removeProductField(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_PRODUCT_FIELD, $id),
            $id
        );
    }

    /**
     * Получение поля товара
     * @param int $id
     * @return ApiResponse
     */
    public function getProductField(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_PRODUCT_FIELD, $id),
            $id
        );
    }

    /**
     * Получение списка полей товара
     * @return ApiResponse
     */
    public function getProductFields() : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_PRODUCT_FIELD)
        );
    }

    /**
     * Обновление поля товара
     * @param int $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateProductField(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_PRODUCT_FIELD, $id),
            $data
        );
    }
}
