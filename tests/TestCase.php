<?php

namespace Zitro\Currency\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Zitro\Currency\CurrencyServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        // Le indicamos a Orchestra que cargue tu Service Provider
        return [
            CurrencyServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Configuración inicial si fuera necesaria (ej. bases de datos en memoria)
    }
}