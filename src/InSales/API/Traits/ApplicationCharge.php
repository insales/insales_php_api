<?php

namespace InSales\API\Traits;
use InSales\API\ApiResponse;

/**
 * Trait ApplicationCharge Часть API-клиента, отвечающая за Счета
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait ApplicationCharge
{
    /**
     * Получение списка счетов
     * @return \InSales\API\ApiResponse
     */
    public function getApplicationCharges() : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_APPLICATION_CHARGES)
        );
    }

    /**
     * Получение счета
     * @param integer $id
     * @return \InSales\API\ApiResponse
     */
    public function getApplicationCharge(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_APPLICATION_CHARGES, $id),
            $id
        );
    }

    /**
     * Создание счета
     * @param array $data
     * @return \InSales\API\ApiResponse
     */
    public function createApplicationCharge(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_APPLICATION_CHARGES),
            $data
        );
    }

    /**
     * Отклонение счета
     * @param integer $id
     * @return \InSales\API\ApiResponse
     */
    public function declineApplicationCharge(int $id)
    {
        $url = $this->generateUrl(self::API_URL_APPLICATION_CHARGES);
        $url = str_replace('.json', "/$id/decline.json", $url);
        return $this->client->executeCreateRequest($url, []);
    }

}
