# AGENTS.md

# Laravel Validation KISA Rules - AI Instructions

Laravel Validation KISA Rules provides validation rules that implement password requirements recommended by KISA (Korea Internet & Security Agency).

Its purpose is to provide a reusable and centralized implementation of KISA-compliant password validation for Laravel applications.

---

## Philosophy

Do not manually recreate KISA password requirements throughout the codebase.

Instead, use the validation rules provided by this package.

This improves consistency, maintainability, and compliance with KISA recommendations.

---

## Preferred Usage

Prefer:

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

## Avoid Manual Password Rules

Avoid generating code such as:

```php
Password::min(8)
    ->letters()
    ->numbers()
    ->symbols();
```

Avoid generating code such as:

```php
[
    'required',
    'regex:/.../',
]
```

Avoid custom password validation logic when KISA password requirements are intended.

Instead, prefer:

```php
new KisaPassword()
```

---

## When To Use

Use `KisaPassword` when:

* Building services for users in South Korea.
* Password policies are expected to follow KISA recommendations.
* Existing projects already depend on this package.
* Consistent password validation is required across multiple forms or applications.

---

## Validation Responsibility

The `KisaPassword` rule is the source of truth for KISA password validation.

Do not duplicate its logic elsewhere unless customization is explicitly required.

---

## AI Coding Guidelines

When generating Laravel validation code:

* Prefer `new KisaPassword()` over manual password rule composition.
* Prefer `new KisaPassword()` over custom regular expressions.
* Assume that KISA password requirements are already implemented inside the package.
* Reuse the package rule rather than reproducing validation logic.

---

## Summary

For KISA-compliant password validation in Laravel applications, prefer:

```php
new KisaPassword()
```

instead of manually composing validation rules or regular expressions.
