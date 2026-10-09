# Module 3 Technical

A small CodeIgniter 4 POS module for customer and user accounts. It includes create/edit forms, validation, avatar upload, image preparation, and a MySQL export.

## Quick start (Windows + XAMPP)

1. Start **Apache** and **MySQL** in XAMPP.
2. Make sure PHP and Composer work in PowerShell:
   - `php -v`
   - `composer -V`
3. Double-click **SETUP.bat** once.
4. Double-click **START.bat** whenever you want to run the app.
5. Open <http://localhost:8080>.

The setup script creates the database **M3Tech**, downloads CodeIgniter into `_runtime`, copies this project's files, runs the migration, and adds sample records.

## If database creation fails

Open phpMyAdmin, create a database named **M3Tech**, then import:

`database/M3Tech.sql`

After that, run `SETUP.bat` again.

## Important folders

- `app/Controllers` - page actions and validation
- `app/Models` - database access
- `app/Views` - HTML forms and lists
- `public/assets/style.css` - the pink coquette design
- `public/uploads` - uploaded avatars at runtime
- `database/M3Tech.sql` - database export for submission

## Avatar rules

- JPG or PNG only
- Maximum 2 MB
- Prepared as a centered 320 x 320 image
- Only the generated filename is saved in the database

## Small-package note

This ZIP intentionally does not include `vendor`. Composer generates it inside `_runtime` during setup. The submitted source remains easy to read and under 100 files.
