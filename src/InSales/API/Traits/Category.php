<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Category Часть API-клиента, отвечающая за Категории на складе
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Category
{
    /**
     * Получение категории
     * @param int $id Идентификатор категории
     * @return ApiResponse
     */
    public function getCategory(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_CATEGORY, $id),
            $id
        );
    }

    /**
     * Получение категорий
     * @return ApiResponse
     */
    public function getCategories() : ApiResponse
    {
        return $this->client->executeListRequest($this->generateUrl(self::API_URL_CATEGORY));
    }

    /**
     * Удаление категории
     * @param int $id Идентификатор категории
     * @return ApiResponse
     */
    public function removeCategory(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_CATEGORY, $id),
            $id
        );
    }

    /**
     * Обновление категории
     * @param int $id Идентификатор категории
     * @param array $data Массив данных
     * @return ApiResponse
     */
    public function updateCategory(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_CATEGORY, $id),
            $data
        );
    }

    /**
     * Создание категории
     * @param array $data
     * @return ApiResponse
     */
    public function createCategory(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_CATEGORY),
            $data
        );
    }
}
