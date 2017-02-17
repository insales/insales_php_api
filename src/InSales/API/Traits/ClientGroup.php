<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait ClientGroup Часть API-клиента, отвечающая за клиентcкие группы
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait ClientGroup
{
    /**
     * Создание клиентской группы
     * @param array $data Массив Данных в структуре документации
     * @return ApiResponse
     */
    public function createClientGroup(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_CLIENT_GROUP),
            $data
        );
    }

    /**
     * Удаление клиентской группы
     * @param int $id Идентификатор клиентской группы
     * @return ApiResponse
     */
    public function removeClientGroup(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_CLIENT_GROUP, $id),
            $id
        );
    }

    /**
     * Получение клиентской группы
     * @param int $id
     * @return ApiResponse
     */
    public function getClientGroup(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_CLIENT_GROUP, $id),
            $id
        );
    }

    /**
     * Получение списка клиентских групп
     * @return ApiResponse
     */
    public function getClientGroups() : ApiResponse
    {
        return $this->client->executeListRequest($this->generateUrl(self::API_URL_CLIENT_GROUP));
    }

    /**
     * Обновление клиентской группы
     * @param int $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateClientGroup(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_CLIENT_GROUP, $id),
            $data
        );
    }
}
