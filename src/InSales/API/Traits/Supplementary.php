<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Supplementary Часть API-клиента, отвечающая за дополнительные товары
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Supplementary
{
    /**
     * Получение списка дополнительных товаров
     * @param int $productId Идентификатор товара
     * @return ApiResponse
     */
    public function getSupplementaries(int $productId) : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateCompoundUrl(self::API_URL_STOCK_SUPLEMENTARY, $productId));
    }

    /**
     * Удаление дополнительности
     * @param int $id
     * @param int $productId  Идентификатор товара
     * @return ApiResponse
     */
    public function removeSupplementary(int $id, int $productId) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateCompoundUrl(self::API_URL_STOCK_SUPLEMENTARY, $productId, $id),
            $id
        );
    }

    /**
     * Создание дополнительности
     * @param int $productId Идентификатор товара
     * @param array $data
     * @return ApiResponse
     */
    public function createSupplementary(int $productId, array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateCompoundUrl(self::API_URL_STOCK_SUPLEMENTARY, $productId),
            $data
        );
    }
}
