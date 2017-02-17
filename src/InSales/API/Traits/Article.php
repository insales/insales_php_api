<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Article Часть API-клиента, отвечающая за Статьи
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Article
{
    /**
     * Получение статьи
     * @param int $id Идентификатор статьи
     * @param int $blogId Идентификатор блога
     * @return ApiResponse
     */
    public function getArticle(int $id, int $blogId) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateCompoundUrl(self::API_URL_ARTICLE, $blogId, $id),
            $id
        );
    }

    /**
     * Получение статей блога
     * @param integer $blogId Идентификатор блога
     * @return ApiResponse
     */
    public function getArticles(int $blogId) : ApiResponse
    {
        return $this->client->executeListRequest($this->generateCompoundUrl(self::API_URL_ARTICLE, $blogId));
    }

    /**
     * Удаление статьи
     * @param int $id Идентификатор статьи
     * @param int $blogId Идентификатор блога
     * @return ApiResponse
     */
    public function removeArticle(int $id, int $blogId) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateCompoundUrl(self::API_URL_ARTICLE, $blogId, $id),
            $id
        );
    }

    /**
     * Обновление статьи
     * @param int $id Идентификатор статьи
     * @param int $blogId Идентификатор блога
     * @param array $data Массив данных
     * @return ApiResponse
     */
    public function updateArticle(int $id, int $blogId, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateCompoundUrl(self::API_URL_ARTICLE, $blogId, $id),
            $data
        );
    }

    /**
     * Создание статьи
     * @param int $blogId Идентификатор блога
     * @param array $data Массив данных статьи
     * @return ApiResponse
     */
    public function createArticle(int $blogId, array $data) : ApiResponse
    {
        $apiResponse = $this->client->executeCreateRequest(
            $this->generateCompoundUrl(self::API_URL_ARTICLE, $blogId),
            $data
        );
        // Костыль в связи с невалидным ответом сервера. Ответ приходит в случае неправильной структуры.
        if ($apiResponse->getHttpCode() == 500 && $apiResponse->getData() === null) {
            $apiResponse->setHttpCode(422);
            $apiResponse->setMessage('Неизвестная ошибка');
            $apiResponse->setData([]);
        }
        return $apiResponse;
    }
}
