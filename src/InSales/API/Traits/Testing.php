<?php

namespace InSales\API\Traits;

/**
 * Trait Test Часть API-клиента, отвечающая  за тестирование
 * @package InSales\Traits
 * @mixin \InSales\API\ApiClient
 */
trait Testing {

    /**
     * Пинг
     * @return string
     */
    public function ping() {
        $response = $this->getOrdersCount();
        if ($response->isSuccessful()) {
            return 'pong';
        } else {
            return 'error';
        }
    }

}