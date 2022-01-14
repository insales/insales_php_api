<?php
namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait RecurringApplicationCharge Часть API-клиента, отвечающая за работу с рекурентными платежами приложения
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait RecurringApplicationCharge
{
    /**
     * Создание рекурентного платежа для приложения
     * @example https://api.insales.ru/?doc_format=JSON&#recurringapplicationcharge-create-recurring-application-charge-json
     *
     * @param array $data
     * @return ApiResponse
     */
    public function createRecurringCharge(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_RECURRING_APPLICATION_CHARGE),
            $data
        );
    }

    /**
     * Удаление рекурентного платежа для приложения
     * @example https://api.insales.ru/?doc_format=JSON#recurringapplicationcharge-destroy-recurring-application-charge-json
     *
     * @return ApiResponse
     */
    public function destroyRecurringCharge() : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_RECURRING_APPLICATION_CHARGE),
            null
        );
    }

    /**
     * Получение информации о рекурентном платеже приложения
     * @example https://api.insales.ru/?doc_format=JSON#recurringapplicationcharge-get-recurring-application-charge-json
     *
     * @return ApiResponse
     */
    public function getRecurringCharge() : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_RECURRING_APPLICATION_CHARGE),
            null
        );
    }

    /**
     * Обновление данных рекурентного платежа для приложения
     * @example https://api.insales.ru/?doc_format=JSON#recurringapplicationcharge-update-recurring-application-charge-json
     *
     * @param array $data
     * @return ApiResponse
     */
    public function updateRecurringCharge(array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_RECURRING_APPLICATION_CHARGE),
            $data
        );
    }

    /**
     * Добавление бесплатных дней приложению
     * @example https://api.insales.ru/?doc_format=JSON#recurringapplicationcharge-add-free-days-to-recurring-application-charge-json
     *
     * @param array $data
     * @return ApiResponse
     */
    public function addFreeDays(array $data) : ApiResponse
    {
        return $this->client->executePatchRequest(
            $this->generateUrl(self::API_URL_RECURRING_APPLICATION_CHARGE, 'add_free_days'),
            $data
        );
    }
}