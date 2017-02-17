<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Collect Часть API-клиента, отвечающая за привязки коллекций к товарам
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Collect
{
    /**
     * Добавление товара в коллекцию
     * Создание новой связки коллекции и товара
     * @param int $productId
     * @param int $collectionId
     * @return ApiResponse
     */
    public function addProductToCollection(int $productId, int $collectionId) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_COLLECTS),
            [
                'collect' => [
                    'collection_id' => $collectionId,
                    'product_id' => $productId
                ]
            ]
        );
    }

    /**
     * Получение списка связок
     * @param array $params
     * @return ApiResponse
     */
    public function getCollects(array $params = []) : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_COLLECTS),
            $params
        );
    }

    /**
     * Обновление связки коллекции и товара
     * @param int $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateCollect(int $id, array $data = []) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_COLLECTS, $id),
            $data
        );
    }

    /**
     * Удаление связки товара с коллекцией
     * @param int $id
     * @return ApiResponse
     */
    public function removeCollect(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_COLLECTS, $id),
            $id
        );
    }
}