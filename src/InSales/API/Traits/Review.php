<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Review Часть API-клиента, отвечающая за отзывы
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Review
{
    /**
     * Получение отзыва
     * @param int $id Идентификатор отзыва
     * @return ApiResponse
     */
    public function getReview(int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateUrl(self::API_URL_REVIEW, $id),
            $id
        );
    }

    /**
     * Получение списка отзывов
     * @return ApiResponse
     */
    public function getReviews() : ApiResponse
    {
        return $this->client->executeListRequest($this->generateUrl(self::API_URL_REVIEW));
    }

    /**
     * Удаление отзыва
     * @param int $id Идентификатор отзыва
     * @return ApiResponse
     */
    public function removeReview(int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateUrl(self::API_URL_REVIEW, $id),
            $id
        );
    }

    /**
     * Обновление отзыва
     * @param int $id Идентификатор отзыва
     * @param array $data Массив данных
     * @return ApiResponse
     */
    public function updateReview(int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateUrl(self::API_URL_REVIEW, $id),
            $data
        );
    }

    /**
     * Создание отзыва
     * @param array $data
     * @return ApiResponse
     */
    public function createReview(array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateUrl(self::API_URL_REVIEW),
            $data
        );
    }
}
