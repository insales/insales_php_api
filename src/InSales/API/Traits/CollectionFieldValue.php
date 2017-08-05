<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait CollectionFieldValue Часть API-клиента, отвечающая за значения полей коллекции
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait CollectionFieldValue
{
    /**
     * Получение значения поля коллекции
     * @param int $collectionId Идентификатор коллекции
     * @param int $id Идентификатор значения поля коллекции
     * @return ApiResponse
     */
    public function getCollectionFieldValue(int $collectionId, $id): ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateCompoundUrl(
                self::API_URL_COLLECTION_FIELD_VALUES, $collectionId, $id),
            $id
        );
    }

    /**
     * Получение списка значений полей коллекций
     * @param int $collectionId Идентификатор коллекции
     * @param array $params
     * @return ApiResponse
     */
    public function getCollectionFieldValues(int $collectionId, array $params = []): ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateCompoundUrl(self::API_URL_COLLECTIONS, $collectionId),
            $params
        );
    }

    /**
     * Обновление значения полей коллекций
     * @param int $collectionId Идентификатор коллекции
     * @param int $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateCollectionFieldValue(int $collectionId, int $id, array $data = []): ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateCompoundUrl(self::API_URL_COLLECTIONS, $collectionId, $id),
            $data
        );
    }

    /**
     * Получение значения поля коллекции по handle
     * @param int $collectionId Идентификатор коллекции
     * @param string $handle короткое название коллекции
     * @return ApiResponse
     */
    public function getCollectionFieldValueByHandle(int $collectionId, string $handle): ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateCompoundUrl(self::API_URL_COLLECTION_FIELD_VALUES . "/" . $handle, $collectionId),
            $handle
        );
    }


}