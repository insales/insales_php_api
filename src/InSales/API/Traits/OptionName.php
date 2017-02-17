<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait OptionName Часть API-клиента, отвечающая за свойства вариантов
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait OptionName
{
    /**
     * Создание свойство вариантов
     * @param array $data
     * @return ApiResponse
     */
    public function createOptionName(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_OPTION_NAMES),
            $data
        );
    }

    /**
     * Удалить свойство вариантов
     * @param int $id
     * @return ApiResponse
     */
    public function removeOptionName(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_OPTION_NAMES, $id),
            $id
        );
    }

    /**
     * Получение свойства вариантов
     * @param int $id
     * @return ApiResponse
     */
    public function getOptionName(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_OPTION_NAMES, $id),
            $id
        );
    }

    /**
     * Получение списка свойств вариантов
     * @return ApiResponse
     */
    public function getOptionNames() : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_OPTION_NAMES)
        );
    }

    /**
     * Обновление свойства вариантов
     * @param int $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateOptionName(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_OPTION_NAMES, $id),
            $data
        );
    }
}
