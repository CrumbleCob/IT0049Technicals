# TSA3 Tasks for Today Management System

A beginner-friendly Laravel 13 task-management application rebuilt with migrations, seeders, Eloquent models, controllers, and Blade views.

## Required pages

- `/` shows only tasks dated today.
- `/tasks` shows every task ordered by date.
- `/profile` shows the single seeded user.
- `/about` identifies the developer.

## Database

- `tasks`: title, status (default `pending`), task_date, timestamps.
- `users`: username (unique), full_name, email, timestamps.
- The seeder creates 8 tasks across 3 dates and exactly 1 user.

## Setup after cloning

```text
composer install
copy .env.example .env
php artisan key:generate
type nul > database\database.sqlite
php artisan migrate:fresh --seed
php artisan serve
```

Open the URL printed by Artisan. PHP 8.3 or newer is required for Laravel 13.

## Developer

Isabella Beatriz Guevarra
