# Laravel Validation KISA Rules

> [!WARNING]
> This package is archived and no longer actively maintained.
>
> It was originally created based on password recommendations published by KISA and related Korean security guidelines available at the time of development.
>
> Those recommendations have since been revised, abolished, or are no longer publicly available.
>
> This package is preserved for legacy applications that still require the historical password policy.

Laravel validation rules implementing password requirements recommended by KISA (Korea Internet & Security Agency).

[![code-style](https://github.com/cable8mm/laravel-validation-kisa-rules/actions/workflows/code-style.yml/badge.svg)](https://github.com/cable8mm/laravel-validation-kisa-rules/actions/workflows/code-style.yml)
[![run-tests](https://github.com/cable8mm/laravel-validation-kisa-rules/actions/workflows/run-tests.yml/badge.svg)](https://github.com/cable8mm/laravel-validation-kisa-rules/actions/workflows/run-tests.yml)
[![Packagist Version](https://img.shields.io/packagist/v/cable8mm/laravel-validation-kisa-rules)](https://packagist.org/packages/cable8mm/laravel-validation-kisa-rules)
[![Packagist Downloads](https://img.shields.io/packagist/dt/cable8mm/laravel-validation-kisa-rules)](https://packagist.org/packages/cable8mm/laravel-validation-kisa-rules/stats)
[![Packagist Dependency Version](https://img.shields.io/packagist/dependency-v/cable8mm/laravel-validation-kisa-rules/php)](https://packagist.org/packages/cable8mm/laravel-validation-kisa-rules)
[![Packagist Stars](https://img.shields.io/packagist/stars/cable8mm/laravel-validation-kisa-rules)](https://github.com/cable8mm/laravel-validation-kisa-rules/stargazers)
[![Packagist License](https://img.shields.io/packagist/l/cable8mm/laravel-validation-kisa-rules)](https://github.com/cable8mm/laravel-validation-kisa-rules/blob/main/LICENSE.md)

## Why this package exists

Many services in South Korea follow password recommendations published by KISA.

Unlike Laravel's built-in `Password` rule, KISA password requirements are conditional.

| Character Types Used | Minimum Length |
| -------------------- | -------------- |
| 1 type               | 10 characters  |
| 2 or more types      | 8 characters   |

For example,

| Password     | Valid |
| ------------ | ----- |
| `aaaaaaaaaa` | ✅     |
| `abcd1234`   | ✅     |
| `abcd!@#$`   | ✅     |
| `abcd123!`   | ✅     |
| `aaaaaaaa`   | ❌     |

Laravel's built-in password validation cannot express these rules.

```php
Password::min(8)
    ->letters()
    ->numbers()
    ->symbols();
```

This package provides a reusable validation rule implementing KISA recommendations.

```php
new KisaPassword()
```

---

## Features

* ✅ Implements KISA password recommendations
* ✅ Supports Laravel validation pipeline
* ✅ Translation ready
* ✅ Composer installable

---

## Support & Tested

| PHP | Laravel |
| --- | ------- |
| 8.1 | 10.x    |
| 8.2 | 10.x    |
| 8.2 | 11.x    |
| 8.2 | 12.x    |
| 8.3 | 10.x    |
| 8.3 | 11.x    |
| 8.3 | 12.x    |

---

## Installation

```bash
composer require cable8mm/laravel-validation-kisa-rules
```

The package registers itself automatically.

---

## Publishing Translations

```bash
php artisan vendor:publish --provider="Cable8mm\ValidationKisaRules\ValidationKisaRulesServiceProvider"
```

---

## Usage

### KisaPassword

```php
use Cable8mm\ValidationKisaRules\Rules\KisaPassword;

$request->validate([
    'password' => [
        'required',
        'confirmed',
        new KisaPassword(),
    ],
]);
```

---

## Testing

```bash
composer test
```

---

## Formatting

```bash
composer lint
```

Automatically fix coding style issues.

```bash
composer inspect
```

Inspect files without modifying them.

---

## References

* KISA password guideline documents

---

## License

The MIT License (MIT).

See LICENSE.md for more information.
