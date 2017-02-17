<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Review Часть API-клиента, отвечающая за поля вариантов
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait VariantField
{
    /**
     * Получение поля вариантов
     * @param int $id Идентификатор поля
     * @return ApiResponse
     */
    public function getVariantField(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_VARIANT_FIELD, $id),
            $id
        );
    }

    /**
     * Получение списка полей вариантов
     * @return ApiResponse
     */
    public function getVariantFields() : ApiResponse
    {
        return $this->client->executeListRequest($this->generateUrl(self::API_URL_VARIANT_FIELD));
    }

    /**
     * Удаление поля
     * @param int $id Идентификатор поля
     * @return ApiResponse
     */
    public function removeVariantField(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_VARIANT_FIELD, $id),
            $id
        );
    }

    /**
     * Обновление поля
     * @param int $id Идентификатор поля
     * @param array $data Массив данных
     * @return ApiResponse
     */
    public function updateVariantField(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_VARIANT_FIELD, $id),
            $data
        );
    }

    /**
     * Создание поля
     * @param array $data
     * @return ApiResponse
     */
    public function createVariantField(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_VARIANT_FIELD),
            $data
        );
    }
}
