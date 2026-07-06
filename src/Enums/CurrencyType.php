<?php

namespace Zitro\Currency\Enums;

enum CurrencyType: string
{
    case PESO_URUGUAYO = 'UYU';
    case DOLAR = 'USD';

    public function symbol(): string
    {
        return match($this) {
            self::PESO_URUGUAYO => '$',
            self::DOLAR => 'USD',
        };
    }

    public function name(): string
    {
        return match($this) {
            self::PESO_URUGUAYO => 'Peso Uruguayo',
            self::DOLAR => 'Dólar Estadounidense',
        };
    }
}