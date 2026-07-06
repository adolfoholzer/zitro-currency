<?php

namespace Zitro\Currency;

use Illuminate\Support\ServiceProvider;

class CurrencyServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Fusiona el archivo config/currency.php usando el alias 'currency'
        $this->mergeConfigFrom(
            __DIR__.'/../config/currency.php', 'currency'
        );

        // Registrar el servicio principal en el contenedor
        $this->app->singleton('zitro-currency', function ($app) {
            return new \Zitro\Currency\Services\CurrencyService();
        });
    }

    public function boot()
    {
        // Permite publicar el archivo usando el tag 'currency-config'
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/currency.php' => config_path('currency.php'),
            ], 'currency-config');
        }
    }
}