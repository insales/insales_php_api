<?php
namespace Liven\InSales\API\Traits;

use Liven\InSales\API\ApiResponse;

/**
 * Trait Account Часть API-клиента, отвечающая за Аккаунт
 * @package Liven\InSales\Traits
 * @mixin \Liven\InSales\API\ApiClient
 */
trait Account
{
    /**
     * Получение сведений об аккаунте
     * @return \Liven\InSales\API\ApiResponse
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
