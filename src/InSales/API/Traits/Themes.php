<?php
namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait Themes Часть API-клиента, отвечающая за действия с файлами темы
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Themes
{
    /**
     * Получение списка тем магазина
     * @example https://pomeo.github.io/node-insales/function/index.html#static-function-listThemes
     *
     * @return ApiResponse
     */
	public function listThemes() : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateUrl(self::API_URL_THEMES)
        );
    }

    /**
     * Список файлов темы
     * @example https://pomeo.github.io/node-insales/function/index.html#static-function-listAsset
     *
     * @param integer $themeId
     * @return ApiResponse
     */
    public function listAssets(int $themeId) : ApiResponse
    {
        return $this->client->executeListRequest(
            $this->generateCompoundUrl(self::API_URL_ASSETS, $themeId)
        );
    }

    /**
     * Получение файла темы по его идентификатору
     * @example https://pomeo.github.io/node-insales/function/index.html#static-function-getAsset
     *
     * @param integer $themeId
     * @param integer $id
     * @return ApiResponse
     */
    public function getAsset(int $themeId, int $id) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateCompoundUrl(self::API_URL_ASSETS, $themeId, $id),
            $id
        );
    }

    /**
     * Редактирование файла темы по его идентификатору
     * @example https://pomeo.github.io/node-insales/function/index.html#static-function-editAsset
     *
     * @param integer $themeId
     * @param integer $id
     * @param array $data
     * @return ApiResponse
     */
    public function updateAsset(int $themeId, int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateCompoundUrl(self::API_URL_ASSETS, $themeId, $id),
            $data
        );
    }

    /**
     * Удаление файла темы по его идентификатору
     * @example https://pomeo.github.io/node-insales/function/index.html#static-function-removeAsset
     *
     * @param integer $themeId
     * @param integer $id
     * @return ApiResponse
     */
    public function removeAsset(int $themeId, int $id) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateCompoundUrl(self::API_URL_ASSETS, $themeId, $id),
            $id
        );
    }

    /**
     * Переименование файла темы по его идентификатору
     * @example https://pomeo.github.io/node-insales/function/index.html#static-function-renameAsset
     *
     * @param integer $themeId
     * @param integer $id
     * @param array $data
     * @return ApiResponse
     */
    public function renameAsset(int $themeId, int $id, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateCompoundUrl(self::API_URL_ASSETS, $themeId, sprintf('%d/rename', $id)),
            $data
        );
    }

    /**
     * Загрузка файла в тему
     * @example https://pomeo.github.io/node-insales/function/index.html#static-function-uploadAsset
     *
     * @param integer $themeId
     * @param array $data
     * @return ApiResponse
     */
    public function uploadAsset(int $themeId, array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateCompoundUrl(self::API_URL_ASSETS, $themeId),
            $data
        );
    }
}