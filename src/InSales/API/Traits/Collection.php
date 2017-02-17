<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Collection Часть API-клиента, отвечающая за коллекции товаров
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Collection
{
    /**
     * Создание коллекции товаров
     * @param array $data
     * @return ApiResponse
     */
    public function createCollection(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_COLLECTIONS),
            $data
        );
    }

    /**
     * Удаление коллекции
     * @param int $id
     * @return ApiResponse
     */
    public function removeCollection(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_COLLECTIONS, $id),
            $id
        );
    }


    /**
     * Получение коллекции
     * @param int $id
     * @return ApiResponse
     */
    public function getCollection(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(
                self::API_URL_COLLECTIONS, $id),
            $id
        );
    }

    /**
     * Получение списка коллекций
     * @param array $params
     * @return ApiResponse
     */
    public function getCollections(array $params = []) : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_COLLECTIONS),
            $params
        );
    }

    /**
     * Обновление коллекции
     * @param int $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateCollection(int $id, array $data = []) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_COLLECTIONS, $id),
            $data
        );
    }
}