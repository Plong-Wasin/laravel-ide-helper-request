# This is my package laravel-ide-helper-extended

[![Latest Version on Packagist](https://img.shields.io/packagist/v/wasinpwg/laravel-ide-helper-extended.svg?style=flat-square)](https://packagist.org/packages/wasinpwg/laravel-ide-helper-extended)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/Plong-Wasin/laravel-ide-helper-extended/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/Plong-Wasin/laravel-ide-helper-extended/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/Plong-Wasin/laravel-ide-helper-extended/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/Plong-Wasin/laravel-ide-helper-extended/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/wasinpwg/laravel-ide-helper-extended.svg?style=flat-square)](https://packagist.org/packages/wasinpwg/laravel-ide-helper-extended)


The provided code represents a Laravel package that aims to enhance the IDE (Integrated Development Environment) autocompletion and code intelligence for certain Laravel components, specifically models and form requests. The package consists of two custom artisan commands: ide-helper:fix and ide-helper:requests.

## Installation

You can install the package via composer:

```bash
composer require wasinpwg/laravel-ide-helper-extended
```

## Usage
1. ide-helper:fix Command:
Purpose: Generates additional class definitions extending Laravel's authentication-related classes for models that extend Illuminate\Foundation\Auth\User, improving IDE autocompletion for authentication methods.

2. ide-helper:requests Command:
Purpose: Generates additional class definitions extending Laravel's form request classes and adds PHPDoc-style comments with data type information for form fields, enhancing IDE autocompletion for validation rules.
```bash
php artisan ide-helper:fix
php artisan ide-helper:requests
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Wasin Phungwigrai](https://github.com/Plong-Wasin)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
