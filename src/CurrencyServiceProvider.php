<?php

namespace Zitro\Currency;

use Zitro\Currency\Services\CurrencyService;
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
            return new CurrencyService();
        });

        $this->app->alias('zitro-currency', CurrencyService::class);
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