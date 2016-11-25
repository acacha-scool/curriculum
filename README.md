[![Build Status](https://travis-ci.org/acacha-scool/curriculum.svg?branch=master)](https://travis-ci.org/acacha-scool/curriculum)


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