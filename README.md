# Laravel Validation KISA Rules

[![code-style](https://github.com/cable8mm/laravel-validation-kisa-rules/actions/workflows/code-style.yml/badge.svg)](https://github.com/cable8mm/laravel-validation-kisa-rules/actions/workflows/code-style.yml)
[![run-tests](https://github.com/cable8mm/laravel-validation-kisa-rules/actions/workflows/run-tests.yml/badge.svg)](https://github.com/cable8mm/laravel-validation-kisa-rules/actions/workflows/run-tests.yml)
[![Packagist Version](https://img.shields.io/packagist/v/cable8mm/laravel-validation-kisa-rules)](https://packagist.org/packages/cable8mm/laravel-validation-kisa-rules)
[![Packagist Downloads](https://img.shields.io/packagist/dt/cable8mm/laravel-validation-kisa-rules)](https://packagist.org/packages/cable8mm/laravel-validation-kisa-rules/stats)
[![Packagist Dependency Version](https://img.shields.io/packagist/dependency-v/cable8mm/laravel-validation-kisa-rules/php)](https://packagist.org/packages/cable8mm/laravel-validation-kisa-rules)
[![Packagist Stars](https://img.shields.io/packagist/stars/cable8mm/laravel-validation-kisa-rules)](https://github.com/cable8mm/laravel-validation-kisa-rules/stargazers)
[![Packagist License](https://img.shields.io/packagist/l/cable8mm/laravel-validation-kisa-rules)](https://github.com/cable8mm/laravel-validation-kisa-rules/blob/main/LICENSE.md)

This repository contains a helpful Laravel validation rule for KISA passwords. KISA is an organization dedicated to securing the internet network in South Korea. Major websites operating in South Korea are required to adhere to KISA password standards. Therefore, this is a small library designed to verify passwords according to the KISA standard.

## Features

- [x] Implement support for KISA standard validation in Laravel
- [x] Enable easy installation via Composer

## Support & Tested

| Available | PHP | Laravel |
| :-------: | :-: | :-----: |
|    ✅     | 8.0 |   9.x   |
|    ✅     | 8.1 |   9.x   |
|    ✅     | 8.1 |  10.x   |
|    ✅     | 8.2 |   9.x   |
|    ✅     | 8.2 |  10.x   |
|    ✅     | 8.2 |  11.x   |
|    ✅     | 8.3 |   9.x   |
|    ✅     | 8.3 |  10.x   |
|    ✅     | 8.3 |  11.x   |

## Installation

You can install the package via composer:

```bash
composer require cable8mm/laravel-validation-kisa-rules
```

The package will automatically register itself.

### Translations

If you wish to edit the package translations, you can run the following command to publish them into your `resources/lang` folder

```bash
php artisan vendor:publish --provider="Cable8mm\ValidationKisaRules\ValidationKisaRulesServiceProvider"
```

## Usage

### `KisaPassword` rule

```php
use Cable8mm\ValidationKisaRules\Rules\KisaPassword;
use Illuminate\Http\Request;

public function store(Request $request)
{
    $validated = $request->validate([
        'password' => ['required', 'confirmed', new KisaPassword()],
    ]);
}
```

### Testing

```bash
composer test
```

### Formatting

```bash
composer lint
# Modify all files to comply with the PHP coding standards.

composer inspect
# Inspect all files to ensure compliance with PHP coding standards.
```

## Reference

- KISA password documents : [go link](https://xn--3e0bx5e6xzftae3gxzpskhile.xn--3e0b707e/2060305/form?postSeq=14&page=1)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
