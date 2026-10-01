# Technical Summative One

This is a beginner-friendly source package for the Tasks for Today Management System. It contains only the activity code and does not include the large `vendor` folder.

## First-time setup

1. Start MySQL in XAMPP.
2. Create an empty database named `TechSum` in phpMyAdmin.
3. Double-click `SETUP.bat`.
4. Keep the command window open while using the website.

The setup script creates an official CodeIgniter project in the `Technical Summative One Project` folder, copies these source files into it, runs the migration and seeder, and opens `http://localhost:8080`.

For later use, double-click `START.bat`.

## Required pages

- `/` displays today's tasks.
- `/tasks` displays every task in date order.
- `/profile` displays the demonstration user.
- `/about` displays the developer information.

## Source folders

- `app/Controllers` contains the controllers.
- `app/Models` contains `TaskModel` and `UserModel`.
- `app/Database` contains the migration and seeder.
- `app/Views` contains the four page views and shared layout.
- `public/assets/css` contains the pastel-pink design.

## GitHub reminder

Upload this small source package to GitHub. Do not upload the generated `Technical Summative One Project/vendor` folder. Composer can recreate it when needed.

## Developer

Isabella Beatriz Guevarra  
IT0049 Web System Technologies
