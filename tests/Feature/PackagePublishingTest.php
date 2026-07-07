<?php

use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Setup & Teardown Helpers
|--------------------------------------------------------------------------
*/

// Helper para limpiar el archivo de configuración clonado
$cleanConfig = function () {
    $target = config_path('currency.php');
    if (file_exists($target)) {
        unlink($target);
    }
    return $target;
};

/*
|--------------------------------------------------------------------------
| Publishing Tests
|--------------------------------------------------------------------------
*/

test('it can publish the configuration file', function () use ($cleanConfig) {
    $targetConfigPath = $cleanConfig();

    expect(file_exists($targetConfigPath))->toBeFalse();

    // Ejecuta el comando de publicación para el tag de configuración
    Artisan::call('vendor:publish', [
        '--tag' => 'currency-config',
    ]);

    expect(file_exists($targetConfigPath))->toBeTrue();

    // Valida que el contenido sea un array válido del paquete
    $publishedConfig = require $targetConfigPath;
    expect($publishedConfig)->toBeArray()
        ->toHaveKey('enabled');

    $cleanConfig();
});