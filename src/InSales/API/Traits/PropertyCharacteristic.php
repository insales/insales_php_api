<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait PropertyCharacteristic Часть API-клиента, отвечающая за варианты значений параметров товаров
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait PropertyCharacteristic
{
    /**
     * Получение сущности
     * @param int $id Идентификатор
     * @param int $propertyId Идентифиатор параметра
     * @return ApiResponse
     */
    public function getPropertyCharacteristic(int $id, int $propertyId) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateCompoundUrl(
                self::API_URL_CHARACTERISTIC,
                $propertyId,
                $id
            ),
            $id
        );
    }

    /**
     * Получение списка сущностей
     * @param int $propertyId Идентификатор параметра
     * @return ApiResponse
     */
    public function getPropertyCharacteristics(int $propertyId) : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateCompoundUrl(
                self::API_URL_CHARACTERISTIC,
                $propertyId
            )
        );
    }

    /**
     * Удаление сущности
     * @param int $id Идентификатор сущности
     * @param int $propertyId Идентификатор параметра
     * @return ApiResponse
     */
    public function removePropertyCharacteristic(int $id, int $propertyId) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateCompoundUrl(
                self::API_URL_CHARACTERISTIC,
                $propertyId,
                $id
            ),
            $id
        );
    }

    /**
     * Обновление сущности
     * @param int $id Идентификатор сущности
     * @param int $propertyId Идентификатор параметра
     * @param array $data Массив данных
     * @return ApiResponse
     */
    public function updatePropertyCharacteristic(int $id, int $propertyId, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateCompoundUrl(
                self::API_URL_CHARACTERISTIC,
                $propertyId,
                $id
            ),
            $data
        );
    }

    /**
     * Создание сущности
     * @param int $propertyId Идентификатор параметра
     * @param array $data
     * @return ApiResponse
     */
    public function createPropertyCharacteristic(int $propertyId, array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateCompoundUrl(
                self::API_URL_CHARACTERISTIC,
                $propertyId
            ),
            $data
        );
    }
}
