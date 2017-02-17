<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait JsTags Часть API-клиента, отвечающая за js-скрипты
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait JsTags
{
    /**
     * Создание скрипта
     * @param array $data
     * @return ApiResponse
     */
    public function createJsTag(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_JS_TAGS),
            $data
        );
    }

    /**
     * Удалить скрипт
     * @param int $id
     * @return ApiResponse
     */
    public function removeJsTag(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_JS_TAGS, $id),
            $id
        );
    }

    /**
     * Получение скрипта
     * @param int $id
     * @return ApiResponse
     */
    public function getJsTag(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_JS_TAGS, $id),
            $id
        );
    }

    /**
     * Получение списка скриптов
     * @return ApiResponse
     */
    public function getJsTags() : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_JS_TAGS)
        );
    }

    /**
     * Обновление скрипта
     * @param int $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateJsTag(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_JS_TAGS, $id),
            $data
        );
    }
}
