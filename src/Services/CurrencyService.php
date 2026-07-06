<?php

namespace Zitro\Currency\Services;

use Zitro\Currency\Enums\CurrencyType;

class CurrencyService
{
    /**
     * Obtiene la moneda por defecto configurada en el paquete.
     *
     * @return string Código de la moneda por defecto (ej: 'UYU').
     */
    public function default(): string
    {
        return config('currency.default', 'UYU');
    }
    
    /**
     * Obtiene solo las monedas que el proyecto decidió habilitar.
     *
     * Filtra los casos del Enum CurrencyType basándose en el archivo de configuración.
     *
     * @return array<string, \Zitro\Currency\Enums\CurrencyType> Array indexado por código que contiene las instancias del Enum.
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
     *
     * @param string $code El código de la moneda a validar (ej: 'USD', 'UYU').
     * @return bool True si la moneda está habilitada, false en caso contrario.
     */
    public function isEnabled(string $code): bool
    {
        return in_array($code, config('currency.enabled', []));
    }
}