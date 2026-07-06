<?php

namespace Zitro\Currency\Facades;

use Illuminate\Support\Facades\Facade;

class ZitroCurrency extends Facade
{
    /**
     * Obtener el nombre registrado del componente.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'zitro-currency';
    }
}