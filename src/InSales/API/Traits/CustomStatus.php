<?php

namespace InSales\API\Traits;
use InSales\API\ApiResponse;

/**
 * Trait CustomStatus Часть API-клиента, отвечающая за статусы заказа
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait CustomStatus {

    /**
     * Получение пользовательского статуса по символьному коду
     * @param $code
     * @return \InSales\API\ApiResponse
     */
    public function getCustomStatusByCode($code) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_CUSTOM_STATUSES,$code),
            $code
        );
    }

    /**
     * Получение списка пользовательских статусов по символьному коду
     * @url http://api.insales.ru/?doc_format=JSON#customstatus-get-custom-statuses-json
     * @return \InSales\API\ApiResponse
     */
    public function getCustomStatuses() : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_CUSTOM_STATUSES)
        );
    }

    /**
     * Удаление пользовательского статуса по символьному коду
     * @param $code string Символьный код пользовательского статуса
     * @return \InSales\API\ApiResponse
     */
    public function removeCustomStatus($code) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_CUSTOM_STATUSES, $code),
            $code
        );
    }

    /**
     * Создание кастомного статуса
     * @param array $data
     * @return ApiResponse
     */
    public function createCustomStatus(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_CUSTOM_STATUSES),
            $data
        );
    }

    /**
     * Обновление кастомного статуса
     * @param string $code
     * @param array $data
     * @return ApiResponse
     */
    public function updateCustomStatus(string $code, array $data = []) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_CUSTOM_STATUSES, $code),
            $data
        );
    }
}