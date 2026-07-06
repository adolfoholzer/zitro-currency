<?php

namespace Zitro\Currency\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string default()
 * @method static array<string, \Zitro\Currency\Enums\CurrencyType> getEnabled()
 * @method static bool isEnabled(string $code)
 * 
 * @see \Zitro\Currency\Services\CurrencyService
 */
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