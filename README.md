# Module 5 Technical — Laravel POS

A four-page POS foundations application built with Laravel, Blade templates, and static customer and user records.

## Pages

| Page | URL |
| --- | --- |
| Home | `/` |
| About | `/about` |
| Customer Accounts | `/customers` |
| User Accounts | `/users` |

## Run locally

Requires PHP 8.3 or newer and Composer 2. Open a terminal in this project folder and run:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve --port=8092
```

Open <http://127.0.0.1:8092>.

## Project guide

- `app/Http/Controllers/` — page logic and sample account records.
- `resources/views/` — Blade layouts and the four pages.
- `routes/web.php` — page routes.
- `public/css/style.css` — site styling.
- `database/` — migrations, factories, and seeders.

The other folders and configuration files support Laravel. Dependencies, local settings, and generated files are excluded through `.gitignore`.
