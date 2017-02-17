<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Domain Часть API-клиента, отвечающая за домены
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Domain {
    /**
     * Добавить домен
     * @param array $data
     * @return ApiResponse
     */
    public function createDomain(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_DOMAINS),
            $data
        );
    }

    /**
     * Удаление домена
     * @param int $id
     * @return ApiResponse
     */
    public function removeDomain(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_DOMAINS, $id),
            $id
        );
    }

    /**
     * Получение домена
     * @param int $id
     * @return ApiResponse
     */
    public function getDomain(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_DOMAINS, $id),
            $id
        );
    }

    /**
     * Получение списка доменов
     * @return ApiResponse
     */
    public function getDomains() : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_DOMAINS)
        );
    }

    /**
     * Обновление домена
     * @param int $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateDomain(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_DOMAINS, $id),
            $data
        );
    }
}