<?php

namespace InSales\API\Traits;

use InSales\API\ApiResponse;

/**
 * Trait OptionValue Часть API-клиента, отвечающая за значения свойства вариантов
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait OptionValue
{
    /**
     * Создание значения свойства вариантов
     * @param int $optionNameId Идентификатор свойства вариантов
     * @param array $data
     * @return ApiResponse
     */
    public function createOptionValue(int $optionNameId, array $data) : ApiResponse
    {
        return $this->client->executeCreateRequest(
            $this->generateCompoundUrl(self::API_URL_OPTION_VALUES, $optionNameId),
            $data
        );
    }

    /**
     * Удалить значение свойства вариантов
     * @param int $id
     * @param int $optionNameId Идентификатор свойства вариантов
     * @return ApiResponse
     */
    public function removeOptionValue(int $id, int $optionNameId) : ApiResponse
    {
        return $this->client->executeRemoveRequest(
            $this->generateCompoundUrl(self::API_URL_OPTION_VALUES, $optionNameId, $id),
            $id
        );
    }

    /**
     * Получение значений свойства вариантов
     * @param int $id
     * @param int $optionNameId Идентификатор свойства вариантов
     * @return ApiResponse
     */
    public function getOptionValue(int $id, int $optionNameId) : ApiResponse
    {
        return $this->client->executeGetRequest(
            $this->generateCompoundUrl(self::API_URL_OPTION_VALUES, $optionNameId, $id),
            $id
        );
    }

    /**
     * Получение списка значений свойств вариантов
     * @param int $optionNameId Идентификатор свойства вариантов
     * @return ApiResponse
     */
    public function getOptionValues(int $optionNameId = null) : ApiResponse
    {
        if ($optionNameId) {
            return $this->client->executeListRequest(
                $this->generateCompoundUrl(self::API_URL_OPTION_VALUES, $optionNameId)
            );
        } else {
            return $this->client->executeListRequest(
                $this->generateUrl(
                    str_replace('/option_names/{slug}', '', self::API_URL_OPTION_VALUES)
                )
            );
        }
    }

    /**
     * Обновление значения свойства вариантов
     * @param int $id
     * @param int $optionNameId Идентификатор свойства вариантов
     * @param array $data
     * @return ApiResponse
     */
    public function updateOptionValue(int $id, int $optionNameId, array $data) : ApiResponse
    {
        return $this->client->executeUpdateRequest(
            $this->generateCompoundUrl(self::API_URL_OPTION_VALUES, $optionNameId, $id),
            $data
        );
    }
}
