<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Blog Часть API-клиента, отвечающая за Блоги
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Blog
{
    /**
     * Получение блога
     * @param int $id Идентификатор виджета
     * @return ApiResponse
     */
    public function getBlog(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_BLOGS, $id),
            $id
        );
    }

    /**
     * Получение блогов
     * @return ApiResponse
     */
    public function getBlogs() : ApiResponse
    {
        return $this->client->executeListRequest($this->generateUrl(self::API_URL_BLOGS));
    }

    /**
     * Удаление блога
     * @param int $id Идентификатор виджета
     * @return ApiResponse
     */
    public function removeBlog(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_BLOGS, $id),
            $id
        );
    }

    /**
     * Обновление блога
     * @param int $id Идентификатор блога
     * @param array $data Массив данных
     * @return ApiResponse
     */
    public function updateBlog(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_BLOGS, $id),
            $data
        );
    }

    /**
     * Создание блога
     * @param array $data
     * @return ApiResponse
     */
    public function createBlog(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_BLOGS),
            $data
        );
    }
}
