# Module 6 Technical Laravel POS

This Laravel 13 application replaces the static customer and user arrays from TFA5 with a real SQLite database and Eloquent ORM.

## Features

- Four routes: Home, About, Customers, and Users
- Separate migrations for the `customers` and `users` tables
- `PosSeeder` with five realistic records in each table
- `Customer` and `User` Eloquent models
- Controllers that retrieve database records through the models
- Blade views that display Eloquent objects with `@forelse`
- Responsive soft pastel pink coquette design

## Database schema

### customers

- `id`
- `full_name`
- `email` unique
- `phone`
- timestamps

### users

- `id`
- `username` unique
- `full_name`
- timestamps

## Local setup

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```

The downloadable classroom package performs these steps automatically through `SETUP.bat`.

## Important files

- `database/migrations` contains the database schema.
- `database/seeders/PosSeeder.php` contains the sample data.
- `app/Models` contains the Eloquent models.
- `app/Http/Controllers` retrieves the records.
- `resources/views` displays the records.

