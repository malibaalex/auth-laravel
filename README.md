# AUTH APP

A simple authentication app built with Laravel 12 and MySQL (XAMPP).

## Features

- Landing page with responsive layout
- User registration with validation
- User login with secure session handling
- Protected dashboard with account overview
- Password show/hide toggle
- Client-side and server-side form validation
- Loading states on buttons and page navigation

## Requirements

- PHP 8.2+
- Composer
- MySQL (XAMPP or standalone)

## Setup

1. Clone the repo:

```bash
git clone https://github.com/malibaalex/auth-laravel.git
cd auth-laravel
```

2. Install dependencies:

```bash
composer install
```

3. Copy and configure environment:

```bash
cp .env.example .env
```

Update the database credentials in `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=auth_app
DB_USERNAME=root
DB_PASSWORD=your_password
```

4. Generate app key:

```bash
php artisan key:generate
```

5. Create a MySQL database called `auth_app`, then run migrations:

```bash
php artisan migrate
```

6. Start the server:

```bash
php artisan serve
```

Visit `http://localhost:8000`.

## Pages

| Route | Description |
|---|---|
| `/` | Landing page |
| `/register` | Create an account |
| `/login` | Log in |
| `/dashboard` | Account overview (protected) |

## Tech Stack

- Laravel 12
- PHP 8.2
- MySQL
- Blade templates
- Vanilla CSS and JS
