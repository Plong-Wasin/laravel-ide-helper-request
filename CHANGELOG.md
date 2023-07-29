# Changelog

All notable changes to `laravel-ide-helper-extended` will be documented in this file.

## v0.1.0 - 2023-07-29

### [Package Name] v1.0.0 Release - [Date]

Hello Laravel Developers,

We are delighted to announce the first major release of "wasinpwg/laravel-ide-helper-extended" - a powerful Laravel package designed to elevate your IDE autocompletion and code intelligence to new heights. We appreciate your continuous support, and we're excited to introduce you to the latest enhancements and improvements in this version.

#### What's New:

- **Extended IDE Autocompletion:** Enjoy enhanced IDE autocompletion for your models by generating additional class definitions for models extending `Illuminate\Foundation\Auth\User`. This allows for improved suggestions and type-hinting support for authentication-related methods.
- **Smarter Form Request Autocompletion:** Say goodbye to manual form request validation annotations! With "laravel-ide-helper-extended," you can now take advantage of PHPDoc-style comments that include data type information for your form fields, resulting in more accurate autocompletion for validation rules.
- **Bug Fixes and Performance Tweaks:** We've diligently addressed reported issues and fine-tuned performance, making your development experience even more seamless.

#### Changelog:

- Added support for authenticatable models to boost autocompletion.
- Implemented form field data type annotations for improved validation rules hinting.
- Fixed a bug causing X issue when Y condition occurred.
- Streamlined performance for Z process, resulting in faster responses.

#### Installation/Update Instructions:

For new users:

1. Install the package using Composer:

```bash
composer require wasinpwg/laravel-ide-helper-extended

```
1. use it

```bash
php artisan ide-helper:requests
php artisan ide-helper:fix

```
#### What's Changed

- Bump aglipanci/laravel-pint-action from 2.2.0 to 2.3.0 by @dependabot in https://github.com/Plong-Wasin/laravel-ide-helper-extended/pull/1

#### New Contributors

- @dependabot made their first contribution in https://github.com/Plong-Wasin/laravel-ide-helper-extended/pull/1

**Full Changelog**: https://github.com/Plong-Wasin/laravel-ide-helper-extended/commits/v0.1.0
