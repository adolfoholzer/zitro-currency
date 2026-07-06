# Zitro Currency

![Tests](https://github.com/usuario/currency/actions/workflows/tests.yml/badge.svg)
![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4)
![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20)
![License](https://img.shields.io/badge/license-MIT-blue.svg)

A lightweight Laravel package that centralizes currency definitions across your applications.

Instead of scattering currency codes and symbols throughout your codebase, this package provides a single source of truth using a strongly typed enum and an easy-to-use service.

---

## Features

- 💰 Strongly typed `CurrencyType` enum
- 🌎 Centralized currency metadata
- ⚙️ Configurable default currency
- 🚀 Laravel Facade
- 🧪 Fully tested with Pest
- ❤️ Designed to be reused by other packages such as Billing, Payments and Invoicing

---

## Requirements

- PHP 8.3+
- Laravel 12+

---

## Installation

Install the package via Composer.

```bash
composer require adolfoholzer/zitro-currency
```

Publish the configuration file.

```bash
php artisan vendor:publish --tag=currency-config
```

---

## Configuration

The published configuration file looks like this:

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Default Currency
    |--------------------------------------------------------------------------
    |
    | This currency will be returned by the CurrencyService whenever the
    | default currency is requested.
    |
    */

    'default' => 'UYU',

];
```

---

## Usage

### Getting the default currency

```php
use Zitro\Currency\Facades\ZitroCurrency;

$currency = ZitroCurrency::default();
```

---

### Using the enum

```php
use Zitro\Currency\Enums\CurrencyType;

$currency = CurrencyType::USD;
```

Example:

```php
$currency->code();
$currency->symbol();
```

---

## Examples

### Currency code

```php
CurrencyType::USD->code();

// USD
```

---

### Currency symbol

```php
CurrencyType::USD->symbol();

// $
```

---

### Comparing currencies

```php
if ($currency === CurrencyType::USD) {
    //
}
```

---

## Available currencies

The package currently supports the following currencies:

| Currency | ISO Code |
|----------|----------|
| Uruguayan Peso | UYU |
| US Dollar | USD |
| Euro | EUR |

> More currencies can easily be added by extending the `CurrencyType` enum.

---

## Testing

Run the test suite.

```bash
./vendor/bin/pest
```

or

```bash
composer test
```

---

## Why use this package?

Without a centralized currency abstraction, applications often end up with code like this:

```php
'$'
'USD'
```

spread throughout controllers, models and services.

Using this package instead:

```php
CurrencyType::USD->symbol();
CurrencyType::USD->code();
```

makes your application easier to maintain, test and extend.

It also allows other packages (Billing, Payments, Invoices, etc.) to share exactly the same currency definitions.

---

## Roadmap

- [ ] Localized currency names
- [ ] Number formatting helpers
- [ ] Money formatting

---

## Contributing

Contributions are welcome.

Please open an issue before submitting large changes so they can be discussed.

---

## License

This package is open-sourced software licensed under the MIT license.