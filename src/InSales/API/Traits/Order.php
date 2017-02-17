<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Order Часть API-клиента, отвечающая за заказы
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Order {

    /**
     * Создание заказа
     * В случае успешного создания заказа возвращает ассоциативный массив созданного заказа
     * В случае неудачи выйдет соответствующее исключение
     * @param array $order Массив заказа в соответствии с документацией
     * @return \InSales\API\ApiResponse Ответ от сервера
     */
    public function createOrder(array $order) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_ORDERS),
            $order
        );
    }

    /**
     * Редактирование заказа
     * @param int $id
     * @param array $order
     * @return \InSales\API\ApiResponse
     */
    public function editOrder(int $id, array $order) : ApiResponse
    {
        return $this->client->executeUpdateRequest($this->generateUrl(self::API_URL_ORDERS, $id), $order);
    }

    /**
     * Получение списка заказов
     * @param array $params Доступные параметры запроса
     * @return \InSales\API\ApiResponse
     */
    public function getOrders(array $params = array()) : ApiResponse
    {
        return $this->client->executeListRequest($this->generateUrl(self::API_URL_ORDERS), $params);
    }

    /**
     *  Получение заказа
     * @param string|integer $id Идентификатор заказа
     * @return \InSales\API\ApiResponse
     */
    public function getOrderById(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_ORDERS, $id),
            $id
        );
    }

    /**
     * Получает количество заказов
     * @return \InSales\API\ApiResponse Количество заказов
     */
    public function getOrdersCount() : ApiResponse
    {
        $client = $this->client;
        $response = $client->request(
            $client::METHOD_GET,
            $client->getBaseUrl() . self::API_URL_ORDERS . '/count.json'
        );
        return $response;
    }

    /**
     * Удаление заказа по идентификатору
     * @param int $id Идентификатор заказа
     * @return \InSales\API\ApiResponse
     */
    public function removeOrder(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_ORDERS, $id),
            $id
        );
    }

    public function updateOrder(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_ORDERS, $id),
            $data
        );
    }
}