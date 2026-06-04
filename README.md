# Laravel CRUD Application

A Laravel 8 CRUD project built for managing records with a simple, clean interface. This repository is configured to run on XAMPP / local PHP development environments and includes Laravel UI, Bootstrap, Vue 2, and standard Laravel authentication scaffolding.

## Project Overview

- Laravel 8 application
- CRUD operations for models using Eloquent
- MySQL database support via XAMPP / local environment
- Asset compilation with Laravel Mix, Bootstrap 5, and Vue 2
- Includes custom helper functions in `app/helper.php`

## Requirements

- PHP 7.3 or higher
- Composer
- Node.js and NPM
- MySQL (via XAMPP, WAMP, or native installation)
- Git (optional)

## Setup Guide

### 1. Install PHP dependencies

Open a terminal in the project root and run:

```bash
composer install
```

### 2. Install JavaScript dependencies

```bash
npm install
```

### 3. Copy environment file

```bash
cp .env.example .env
```

On Windows, if `cp` is not available, use:

```powershell
copy .env.example .env
```

### 4. Configure database

Edit `.env` and set your MySQL credentials. Example:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelcrud
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Run database migrations

```bash
php artisan migrate
```

If you have seeders available, run:

```bash
php artisan db:seed
```

### 7. Build assets

For development:

```bash
npm run dev
```

For production:

```bash
npm run production
```

### 8. Start the application

Use the Laravel development server:

```bash
php artisan serve
```

Then open the application in your browser at:

```text
http://127.0.0.1:8000
```

If you are using XAMPP and the project is placed inside `htdocs`, you can also access it through your local Apache URL, for example:

```text
http://localhost/22_LaravelCrud/public
```

## Common Commands

- `php artisan serve` — run the local development server
- `php artisan migrate` — apply database migrations
- `php artisan migrate:fresh --seed` — reset database and run seeders
- `npm run dev` — compile frontend assets for development
- `npm run production` — compile frontend assets for production

## Project Structure

- `app/` — application logic, controllers, middleware, models
- `resources/views/` — Blade templates
- `routes/web.php` — web routes
- `public/` — web server document root
- `database/migrations/` — migration files
- `database/seeders/` — database seeder classes
- `webpack.mix.js` — Laravel Mix asset pipeline configuration

## Notes

- The `uploads/` folder under `public/` is available for file storage if the application uses file uploads.
- If you need to clear caches after changing configuration, use:
  - `php artisan config:cache`
  - `php artisan route:cache`
  - `php artisan view:clear`

## License

This project is open source and available under the [MIT license](https://opensource.org/licenses/MIT).
