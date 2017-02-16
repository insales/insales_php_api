<?php

namespace Liven\InSales\API\Traits;

/**
 * Trait Test Часть API-клиента, отвечающая  за тестирование
 * @package Liven\InSales\Traits
 * @mixin \Liven\InSales\API\ApiClient
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