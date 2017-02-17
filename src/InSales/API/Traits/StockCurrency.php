<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait StockCurrency Часть API-клиента, отвечающая за валюты склада
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait StockCurrency
{
    /**
     * Получение валюты
     * @param int $id Идентификатор валюты
     * @return ApiResponse
     */
    public function getStockCurrency(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_STOCK_CURRENCY, $id),
            $id
        );
    }

    /**
     * Получение списка валют
     * @return ApiResponse
     */
    public function getStockCurrencies() : ApiResponse
    {
        return $this->client->executeListRequest($this->generateUrl(self::API_URL_STOCK_CURRENCY));
    }

    /**
     * Удаление валюты
     * @param int $id Идентификатор валюты
     * @return ApiResponse
     */
    public function removeStockCurrency(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_STOCK_CURRENCY, $id),
            $id
        );
    }

    /**
     * Обновление валюты
     * @param int $id Идентификатор валюты
     * @param array $data Массив данных
     * @return ApiResponse
     */
    public function updateStockCurrency(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_STOCK_CURRENCY, $id),
            $data
        );
    }

    /**
     * Создание валюты
     * @param array $data
     * @return ApiResponse
     */
    public function createStockCurrency(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_STOCK_CURRENCY),
            $data
        );
    }
}
