<?php
namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait ApplicationAction Часть API-клиента, отвечающая за действия приложения в адимнистративной панели
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait ApplicationAction
{
    /**
     * Создание действия приложения
     * @example https://api.insales.ru/?doc_format=JSON#applicationaction-create-application-action-json
     *
     * @param array $action
     * @return ApiResponse
     */
    public function createAction(array $action) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_APPLICATION_ACTION),
            $action
        );
    }

    /**
     * Удаление действия приложения по его идентификатору
     * @example https://api.insales.ru/?doc_format=JSON#applicationaction-destroy-application-action-json
     *
     * @param integer $id
     * @return ApiResponse
     */
    public function destroyAction(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_APPLICATION_ACTION, $id),
            $id
        );
    }

    /**
     * Получение списка действий приложения
     * @example https://api.insales.ru/?doc_format=JSON#applicationaction-get-application-actions-json
     *
     * @return ApiResponse
     */
    public function getActions() : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_APPLICATION_ACTION)
        );
    }

    /**
     * Получения действия приложения по его идентификатору
     * @example https://api.insales.ru/?doc_format=JSON#applicationaction-get-application-action-json
     *
     * @param integer $id
     * @return ApiResponse
     */
    public function getActionById(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_APPLICATION_ACTION, $id),
            $id
        );
    }

    /**
     * Обновление информации о действии приложения
     * @example https://api.insales.ru/?doc_format=JSON#applicationaction-update-application-action-json
     *
     * @param integer $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateAction(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_APPLICATION_ACTION, $id),
            $data
        );
    }
}