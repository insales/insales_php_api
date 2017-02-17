<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait VariantFieldValue Часть API-клиента, отвечающая за значения полей вариантов
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait VariantFieldValue
{
    /**
     * Получение значения поля вариантов
     * @param int $id Идентификатор поля
     * @param int $productId Идентификатор товара
     * @return ApiResponse
     */
    public function getVariantFieldValue(int $id, int $productId) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateCompoundUrl(self::API_URL_VARIANT_FIELD_VALUE, $productId, $id),
            $id
        );
    }

    /**
     * Получение списка значений поля вариантов
     * @param int $productId Идентификатор товара
     * @return ApiResponse
     */
    public function getVariantFieldValues(int $productId) : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateCompoundUrl(self::API_URL_VARIANT_FIELD_VALUE, $productId)
        );
    }

    /**
     * Удаление значения поля вариантов
     * @param int $id Идентификатор поля
     * @param int $productId Идентификатор товара
     * @return ApiResponse
     */
    public function removeVariantFieldValue(int $id, int $productId) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateCompoundUrl(self::API_URL_VARIANT_FIELD_VALUE, $productId, $id),
            $id
        );
    }

    /**
     * Обновление значения поля вариантов
     * @param int $id Идентификатор поля
     * @param int $productId Идентификатор товара
     * @param array $data Массив данных
     * @return ApiResponse
     */
    public function updateVariantFieldValue(int $id, int $productId, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateCompoundUrl(self::API_URL_VARIANT_FIELD_VALUE, $productId, $id),
            $data
        );
    }

    /**
     * Создание значения поля вариантов
     * @param int $productId Идентификатор товара
     * @param array $data
     * @return ApiResponse
     */
    public function createVariantFieldValue(int $productId, array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateCompoundUrl(self::API_URL_VARIANT_FIELD_VALUE, $productId),
            $data
        );
    }
}
