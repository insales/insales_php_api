<?php

namespace InSales\API\Traits;
use InSales\API\ApiResponse;

/**
 * Trait ApplicationWidget Часть API-клиента, отвечающая за Виджеты
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait ApplicationWidget
{
    /**
     * Получение виджета
     * @param int $id Идентификатор виджета
     * @return ApiResponse
     */
    public function getApplicationWidget(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_APPLICATION_WIDGET, $id),
            $id
        );
    }

    /**
     * Получение списка виджетов
     * @return ApiResponse
     */
    public function getApplicationWidgets() : ApiResponse
    {
        return $this->client->executeListRequest($this->generateUrl(self::API_URL_APPLICATION_WIDGET));
    }

    /**
     * Удаление виджета
     * @param int $id Идентификатор виджета
     * @return ApiResponse
     */
    public function removeApplicationWidget(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_APPLICATION_WIDGET, $id),
            $id
        );
    }

    /**
     * Обновление виджета
     * @param int $id Идентификатор виджета
     * @param array $data Массив данных виджета
     * @return ApiResponse
     */
    public function updateApplicationWidget(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_APPLICATION_WIDGET, $id),
            $data
        );
    }

    /**
     * Создание виджета
     * @param array $data
     * @return ApiResponse
     */
    public function createApplicationWidget(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_APPLICATION_WIDGET),
            $data
        );
    }
}
