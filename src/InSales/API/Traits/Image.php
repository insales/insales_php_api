<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait File Часть API-клиента, отвечающая за изображения товаров
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Image
{
    /**
     * Создание изображения товара
     * @param int $productId Идентификатор товара
     * @param array $data
     * @return ApiResponse
     */
    public function createImage(int $productId, array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateCompoundUrl(self::API_URL_IMAGES, $productId),
            $data
        );
    }

    /**
     * Удалить изображение товара
     * @param int $id
     * @param int $productId Идентификатор товара
     * @return ApiResponse
     */
    public function removeImage(int $id, int $productId) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateCompoundUrl(self::API_URL_IMAGES, $productId, $id),
            $id
        );
    }

    /**
     * Получение изображения товара
     * @param int $id
     * @param int $productId Идентификатор товара
     * @return ApiResponse
     */
    public function getImage(int $id, int $productId) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateCompoundUrl(self::API_URL_IMAGES, $productId, $id),
            $id
        );
    }

    /**
     * Получение списка изображений товара
     * @param int $productId Идентификатор товара
     * @return ApiResponse
     */
    public function getImages(int $productId) : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateCompoundUrl(self::API_URL_IMAGES, $productId)
        );
    }

    /**
     * Обновление изображения товара
     * @param int $id
     * @param int $productId Идентификатор товара
     * @param array $data
     * @return ApiResponse
     */
    public function updateImage(int $id, int $productId, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateCompoundUrl(self::API_URL_IMAGES, $productId, $id),
            $data
        );
    }
}
