<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Variant Часть API-клиента, отвечающая за вариации товара
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Variant
{
    /**
     * Получение варианта
     * @param int $id Идентификатор отзыва
     * @param int $productId Идентификатор товара
     * @return ApiResponse
     */
    public function getVariant(int $id, int $productId) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateCompoundUrl(self::API_URL_VARIANT, $productId, $id),
            $id
        );
    }

    /**
     * Получение списка отзывов
     * @param int $productId Идентификатор товара
     * @return ApiResponse
     */
    public function getVariants(int $productId) : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateCompoundUrl(self::API_URL_VARIANT, $productId)
        );
    }

    /**
     * Удаление отзыва
     * @param int $id Идентификатор отзыва
     * @param int $productId Идентификатор товара
     * @return ApiResponse
     */
    public function removeVariant(int $id, int $productId) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateCompoundUrl(self::API_URL_VARIANT, $productId, $id),
            $id
        );
    }

    /**
     * Обновление отзыва
     * @param int $id Идентификатор отзыва
     * @param int $productId Идентификатор товара
     * @param array $data Массив данных
     * @return ApiResponse
     */
    public function updateVariant(int $id, int $productId, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateCompoundUrl(self::API_URL_VARIANT, $productId, $id),
            $data
        );
    }

    /**
     * Создание отзыва
     * @param int $productId Идентификатор товара
     * @param array $data
     * @return ApiResponse
     */
    public function createVariant(int $productId, array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateCompoundUrl(self::API_URL_VARIANT, $productId),
            $data
        );
    }
}
