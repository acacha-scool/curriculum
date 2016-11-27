# Scool/Curriculum

[![Build Status](https://travis-ci.org/acacha-scool/curriculum.svg?branch=master)](https://travis-ci.org/acacha-scool/curriculum)
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Installation ##

In a Laravel project execute: 

```bash
composer require scool/curriculum
```

Add to file **config/app.php** the CurriculumServiceProvider:

```php
...
 /*
 * Package Service Providers...
 */
 Scool\Curriculum\Providers\CurriculumServiceProvider::class,
... 
```

And publish files with:

```bash
php artisan vendor:publish --tag=scool_curriculum
```

## Database ##

Use:

```bash
php artisan migrate:status
```

To see curriculum migrations and run migrations with:

```bash
php artisan migrate
```

Factories for all models are installed in **database/factories**.

To use Curriculum Seeders modify file **database/seeds/DatabaseSeeder**:

```php
public function run()
{
    $this->call(CurriculumSeeder::class);
}
```

## User configuration ##

Traits to add to User class:

- HasSpecialities
- 

## Seeders ##

Private data: https://github.com/Institut-Ebre/ebreescool_seeders

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [:author_name][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/:vendor/:package_name
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/:vendor/:package_name
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors