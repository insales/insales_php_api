<?php

namespace Liven\InSales\API\Traits;

use Liven\InSales\API\ApiResponse;

/**
 * Trait File Часть API-клиента, отвечающая за аккаунтов
 * @package Liven\InSales\Traits
 * @mixin \Liven\InSales\API\ApiClient
 */
trait InvitedAccount
{
    /**
     * Получение аккаунтов
     * @param int $id
     * @return ApiResponse
     */
    public function getInvitedAccount(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_INVITED_ACCOUNTS, $id),
            $id
        );
    }

    /**
     * Получение списка аккаунтов
     * @return ApiResponse
     */
    public function getInvitedAccounts() : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_INVITED_ACCOUNTS)
        );
    }
}
