<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Similar Часть API-клиента, отвечающая за аналогичные товары
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Similar
{
    /**
     * Получение списка похожих товаров
     * @param int $productId Идентификатор товара
     * @return ApiResponse
     */
    public function getSimilars(int $productId) : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateCompoundUrl(self::API_URL_SIMILAR, $productId));
    }

    /**
     * Удаление похожести
     * @param int $id Идентификатор похожести
     * @param int $productId  Идентификатор товара
     * @return ApiResponse
     */
    public function removeSimilar(int $id, int $productId) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateCompoundUrl(self::API_URL_SIMILAR, $productId, $id),
            $id
        );
    }

    /**
     * Создание похожести
     * @param int $productId Идентификатор товара
     * @param array $data
     * @return ApiResponse
     */
    public function createSimilar(int $productId, array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateCompoundUrl(self::API_URL_SIMILAR, $productId),
            $data
        );
    }
}
