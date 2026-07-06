<?php

namespace Zitro\Currency\Services;

use Zitro\Currency\Enums\CurrencyType;

class CurrencyService
{
    /**
     * Obtiene solo las monedas que el proyecto decidió habilitar.
     * @return array<string, Currency>
     */
    public function getEnabled(): array
    {
        $enabledConfig = config('currency.enabled', []);
        $result = [];

        foreach (CurrencyType::cases() as $currency) {
            if (in_array($currency->value, $enabledConfig)) {
                $result[$currency->value] = $currency;
            }
        }

        return $result;
    }

    /**
     * Valida si una moneda específica está activa en este proyecto.
     */
    public function isEnabled(string $code): bool
    {
        return in_array($code, config('currency.enabled', []));
    }
}