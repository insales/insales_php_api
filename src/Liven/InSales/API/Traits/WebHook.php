<?php

namespace Liven\InSales\API\Traits;

use Liven\InSales\API\ApiResponse;

/**
 * Trait WebHook Часть API-клиента, отвечающая за вебхуки
 * @package Liven\InSales\Traits
 * @mixin \Liven\InSales\API\ApiClient
 */
trait WebHook
{
    /**
     * Получение вебхука
     * @param int $id Идентификатор вебхука
     * @return ApiResponse
     */
    public function getWebhook(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_WEBHOOK, $id),
            $id
        );
    }

    /**
     * Получение списка вебхуков
     * @return ApiResponse
     */
    public function getWebhooks() : ApiResponse
    {
        return $this->client->executeListRequest($this->generateUrl(self::API_URL_WEBHOOK));
    }

    /**
     * Удаление вебхука
     * @param int $id Идентификатор вебхука
     * @return ApiResponse
     */
    public function removeWebhook(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_WEBHOOK, $id),
            $id
        );
    }

    /**
     * Обновление вебхука
     * @param int $id Идентификатор вебхука
     * @param array $data Массив данных
     * @return ApiResponse
     */
    public function updateWebhook(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_WEBHOOK, $id),
            $data
        );
    }

    /**
     * Создание вебхука
     * @param array $data
     * @return ApiResponse
     */
    public function createWebhook(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_WEBHOOK),
            $data
        );
    }
}
