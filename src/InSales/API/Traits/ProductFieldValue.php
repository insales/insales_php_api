<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait ProductFieldValueValue Часть API-клиента, отвечающая за значения поля товаров
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait ProductFieldValue
{
    /**
     * Создание значения поля товара
     * @param int $productFieldId Идентификатор поля товара
     * @param array $data
     * @return ApiResponse
     */
    public function createProductFieldValue(int $productFieldId, array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateCompoundUrl(self::API_URL_PRODUCT_FIELD_VALUE, $productFieldId),
            $data
        );
    }

    /**
     * Удалить значение поля товара
     * @param int $id
     * @param int $productFieldId Идентификатор поля товара
     * @return ApiResponse
     */
    public function removeProductFieldValue(int $id, int $productFieldId) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateCompoundUrl(self::API_URL_PRODUCT_FIELD_VALUE, $productFieldId, $id),
            $id
        );
    }

    /**
     * Получение значения поля товара
     * @param int $id
     * @param int $productFieldId Идентификатор поля товара
     * @return ApiResponse
     */
    public function getProductFieldValue(int $id, int $productFieldId) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateCompoundUrl(self::API_URL_PRODUCT_FIELD_VALUE, $productFieldId, $id),
            $id
        );
    }

    /**
     * Получение списка значений полей товара
     * @param int $productFieldId Идентификатор поля товара
     * @return ApiResponse
     */
    public function getProductFieldValues(int $productFieldId) : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateCompoundUrl(self::API_URL_PRODUCT_FIELD_VALUE, $productFieldId)
        );
    }

    /**
     * Обновление значения поля товара
     * @param int $id
     * @param int $productFieldId Идентификатор поля товара
     * @param array $data
     * @return ApiResponse
     */
    public function updateProductFieldValue(int $id, int $productFieldId, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateCompoundUrl(self::API_URL_PRODUCT_FIELD_VALUE, $productFieldId, $id),
            $data
        );
    }
}
