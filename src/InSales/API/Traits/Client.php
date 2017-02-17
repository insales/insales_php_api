<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Client Часть API-клиента, отвечающая за Клиентов
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Client
{
    /**
     * Получение клиента
     * @param int $id Идентификатор сущности
     * @return ApiResponse
     */
    public function getClient(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_CLIENT, $id),
            $id
        );
    }

    /**
     * Получение клиентов
     * @param array $params
     * @return ApiResponse
     */
    public function getClients(array $params = []) : ApiResponse
    {
        return $this->client->executeListRequest($this->generateUrl(self::API_URL_CLIENT), $params);
    }

    /**
     * Удаление клиента
     * @param int $id Идентификатор сущности
     * @return ApiResponse
     */
    public function removeClient(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_CLIENT, $id),
            $id
        );
    }

    /**
     * Обновление клиента
     * @param int $id Идентификатор клиента
     * @param array $data Массив данных
     * @return ApiResponse
     */
    public function updateClient(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_CLIENT, $id),
            $data
        );
    }

    /**
     * Создание клиента
     * @param array $data
     * @return ApiResponse
     */
    public function createClient(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_CLIENT),
            $data
        );
    }
}
