# Getting Started with Laravel App

## Prepare Environment Variables

Copy or rename `.env.example` to `.env` file inside the app root folder and update the following lines to matched your database setup:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbname
DB_USERNAME=dbuser
DB_PASSWORD=dbpass
```

## Available Scripts

In the project directory, you can run:

## `composer install`

Make sure to install packages for this Laravel App

## `php artisan migrate`

Generate table schemas for the project.

## `php artisan db:seed --class=RolesSeeder`

Mandatory process to create Roles db records.

## `php artisan db:seed --class=UserSeeder`

This will create two test users with sets of roles.

### `php artisan serve`

Runs the app in the development mode.\
Open [http://localhost:8000](http://localhost:8000) to view it in the browser.
