# Laravel POS Foundations TFA5

This Laravel 13 application rebuilds the four-page POS foundations activity using routes, controllers, Blade views, navigation, and static PHP arrays.

## Requirements

- PHP 8.3 or newer
- Composer 2
- Laravel 13 dependencies installed with `composer install`

## Local setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve --port=8092
```

Then open <http://127.0.0.1:8092>.

## Artisan checks

```bash
php artisan --version
php artisan route:list --except-vendor
php artisan list make
```

## Required routes

| URL | Controller | View |
| --- | --- | --- |
| `/` | `PageController@home` | `home.blade.php` |
| `/about` | `PageController@about` | `about.blade.php` |
| `/customers` | `CustomerController@index` | `customers.blade.php` |
| `/users` | `UserController@index` | `users.blade.php` |

## Static data handling

`CustomerController` contains five sample customer records. `UserController` contains five sample user records. The controller passes each array to its Blade view, and the view renders the records using `@foreach`.

The activity intentionally uses static PHP arrays as temporary data sources. The default Laravel migration and seeder files remain available in the repository for future database work and submission completeness, but the four required pages do not query a database.

## Project structure

- `routes/web.php` - defines all four routes
- `app/Http/Controllers` - contains the page and account controllers
- `resources/views` - contains the shared layout and four Blade pages
- `public/css/style.css` - contains the pastel pink interface
- `database/migrations` - Laravel migration files
- `database/seeders` - Laravel seeder files

## Submission

Add the GitHub repository and hosted application links to `SUBMISSION.md` before submitting.
