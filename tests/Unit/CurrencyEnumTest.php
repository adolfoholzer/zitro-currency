<?php

use Zitro\Currency\Enums\CurrencyType;

test('corre tests de CurrencyEnumTest', function () {
    expect(true)->toBeTrue();
});

test('el enum devuelve el símbolo correcto', function () {
    expect(CurrencyType::PESO_URUGUAYO->symbol())->toBe('$')
        ->and(CurrencyType::USD->symbol())->toBe('USD');
});

test('el enum devuelve el nombre correcto', function () {
    expect(CurrencyType::PESO_URUGUAYO->name())->toBe('Peso Uruguayo')
        ->and(CurrencyType::USD->name())->toBe('Dólar Estadounidense');
});