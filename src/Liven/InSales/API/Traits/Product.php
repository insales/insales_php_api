<?php

namespace Liven\InSales\API\Traits;
use Liven\InSales\API\ApiResponse;

/**
 * Trait Product Часть API-клиента, отвечающая за товары
 * @package Liven\InSales\Traits
 * @mixin \Liven\InSales\API\ApiClient
 */
trait Product {
    /**
     * Создание товара
     * В случае успешного создания товара возвращает ассоциативный массив созданного товара
     * @param array $product Массив созданного товара
     * @return \Liven\InSales\API\ApiResponse
     */
    public function createProduct(array $product) {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_PRODUCTS),
            $product
        );
    }

    /**
     * Получение товаров
     * @param array $params Параметры запроса
     * @return \Liven\InSales\API\ApiResponse
     */
    public function getProducts($params = []) {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_PRODUCTS),
            $params
        );
    }

    /**
     * Получение товара по идентификатору
     * @param $id
     * @return \Liven\InSales\API\ApiResponse
     */
    public function getProductById($id) {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_PRODUCTS, $id),
            $id
        );
    }

    /**
     * Удаление товара по идентификатору
     * @param $id string|integer Идентификатор товара
     * @return \Liven\InSales\API\ApiResponse Результат удаления
     */
    public function removeProduct($id) {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_PRODUCTS, $id),
            $id
        );
    }

    /**
     * Обновление товара
     * @param int $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateProduct(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_PRODUCTS, $id),
            $data
        );
    }
}