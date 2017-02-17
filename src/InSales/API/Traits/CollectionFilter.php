<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait CollectionFilter Часть API-клиента, отвечающая за фильтры коллекции
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait CollectionFilter
{
    /**
     * Создание фильтра коллекции
     * @param array $data
     * @return ApiResponse
     */
    public function createCollectionFilter(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_COLLECTION_FILTERS),
            $data
        );
    }

    /**
     * Удаление фильтра коллекции
     * @param int $id
     * @return ApiResponse
     */
    public function removeCollectionFilter(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_COLLECTION_FILTERS, $id),
            $id
        );
    }

    /**
     * Получение фильтра коллекции
     * @param int $id
     * @return ApiResponse
     */
    public function getCollectionFilter(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_COLLECTION_FILTERS, $id),
            $id
        );
    }

    /**
     * Получение списка фильтров коллекции
     * @param array $params
     * @return ApiResponse
     */
    public function getCollectionFilters(array $params = []) : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_COLLECTION_FILTERS),
            $params
        );
    }

    /**
     * Обновление коллекции фильтров
     * @param int $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateCollectionFilter(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_COLLECTION_FILTERS, $id), $data
        );
    }
}