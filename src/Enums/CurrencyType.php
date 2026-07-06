<?php

namespace Zitro\Currency\Enums;

enum CurrencyType: string
{
    case PESO_URUGUAYO = 'UYU';
    case USD = 'USD';
    case EURO = 'EUR';

    public function symbol(): string
    {
        return match($this) {
            self::PESO_URUGUAYO => '$',
            self::USD => 'USD',
            self::EURO => '€',
        };
    }

    public function name(): string
    {
        return match($this) {
            self::PESO_URUGUAYO => 'Peso Uruguayo',
            self::USD => 'Dólar Estadounidense',
            self::EURO => 'Euro',
        };
    }
}