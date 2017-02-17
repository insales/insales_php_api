<?php
namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Account Часть API-клиента, отвечающая за Аккаунт
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Account
{
    /**
     * Получение сведений об аккаунте
     * @return ApiResponse
     */
    public function getAccount() : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_ACCOUNT)
        );
    }

    /**
     * Обновление данных аккаунта
     * @param array $data
     * @return ApiResponse
     */
    public function updateAccount(array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_ACCOUNT),
            $data
        );
    }
}
