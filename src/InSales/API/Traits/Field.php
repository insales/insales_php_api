<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Field Часть API-клиента, отвечающая за поля
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Field
{
    /**
     * Создание поля
     * @param array $data
     * @return ApiResponse
     */
    public function createField(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_FIELDS),
            $data
        );
    }

    /**
     * Удалить поле
     * @param int $id
     * @return ApiResponse
     */
    public function removeField(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_FIELDS, $id),
            $id
        );
    }

    /**
     * Получение поля
     * @param int $id
     * @return ApiResponse
     */
    public function getField(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_FIELDS, $id),
            $id
        );
    }

    /**
     * Получение списка полей
     * @return ApiResponse
     */
    public function getFields() : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_FIELDS)
        );
    }

    /**
     * Обновление поля
     * @param int $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateField(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_FIELDS, $id),
            $data
        );
    }
}
