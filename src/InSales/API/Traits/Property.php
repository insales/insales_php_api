<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Property Часть API-клиента, отвечающая за параметры товаров
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Property
{
    /**
     * Получение параметра товара
     * @param int $id Идентификатор категории
     * @return ApiResponse
     */
    public function getProperty(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_PROPERTY, $id),
            $id
        );
    }

    /**
     * Получение списка параметров товаров
     * @return ApiResponse
     */
    public function getProperties() : ApiResponse
    {
        return $this->client->executeListRequest($this->generateUrl(self::API_URL_PROPERTY));
    }

    /**
     * Удаление Параметра товара
     * @param int $id Идентификатор параметра
     * @return ApiResponse
     */
    public function removeProperty(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_PROPERTY, $id),
            $id
        );
    }

    /**
     * Обновление параметра товара
     * @param int $id Идентификатор параметра
     * @param array $data Массив данных
     * @return ApiResponse
     */
    public function updateProperty(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_PROPERTY, $id),
            $data
        );
    }

    /**
     * Создание параметра товара
     * @param array $data
     * @return ApiResponse
     */
    public function createProperty(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_PROPERTY),
            $data
        );
    }
}
