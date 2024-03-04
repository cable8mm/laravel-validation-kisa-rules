# A set of useful Laravel validation rules

This repository contains some useful Laravel validation password rules.

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

## Available rules

### `KisaPassword`

### Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
