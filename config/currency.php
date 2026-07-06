<?php

use Zitro\Currency\Enums\CurrencyType;

return [
    /*
    |--------------------------------------------------------------------------
    | Monedas Habilitadas en la Aplicación
    |--------------------------------------------------------------------------
    */
    'enabled' => [
        CurrencyType::PESO_URUGUAYO->value,
        CurrencyType::DOLAR->value,
    ],

    /*
    | Moneda por defecto del sistema
    |--------------------------------------------------------------------------
    */
    'default' => CurrencyType::PESO_URUGUAYO->value,
];