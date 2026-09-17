# Basic POS System

A basic four-page Point-of-Sale website made with CodeIgniter 4.

## Pages

- `/` — landing page
- `/about` — about page
- `/customers` — five customer records from a static PHP array
- `/users` — five user/staff records from a static PHP array

No database is used in this version.

## Run the project

Install dependencies after cloning from GitHub:

```bash
composer install
```

Create the local environment file:

### Windows

```bat
copy .env.example .env
```

### Linux or macOS

```bash
cp .env.example .env
```

Start CodeIgniter:

```bash
php spark serve
```

Open `http://localhost:8080/` in a browser.

## Project structure

```text
app/Config/Routes.php          Website routes
app/Controllers/Pages.php     Home and About pages
app/Controllers/Customers.php Customer array
app/Controllers/Users.php     User/staff array
app/Views/                    Page templates
public/css/style.css          Basic page design
```

The `vendor` folder and `.env` file are intentionally excluded from GitHub by the CodeIgniter `.gitignore` file.
