# AUTH APP

A simple authentication app built with Laravel 12 and MySQL.

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
- MySQL (via XAMPP or standalone)

## Local Setup (XAMPP)

### 1. Install XAMPP

Download and install XAMPP from https://www.apachefriends.org. This gives you PHP, MySQL, and phpMyAdmin.

### 2. Start XAMPP

Open XAMPP Control Panel and start **Apache** and **MySQL**.

### 3. Install Composer

Download and install Composer from https://getcomposer.org/Composer-Setup.exe. During installation, let it add PHP to your PATH (it will point to your XAMPP PHP at `C:\xampp\php\php.exe`).

### 4. Clone the repo

```bash
git clone https://github.com/malibaalex/auth-laravel.git
cd auth-laravel
```

### 5. Install dependencies

```bash
composer install
```

### 6. Configure environment

```bash
cp .env.example .env
```

Open `.env` and set your database credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=auth_app
DB_USERNAME=root
DB_PASSWORD=your_mysql_password
```

### 7. Generate app key

```bash
php artisan key:generate
```

### 8. Create the database

Open phpMyAdmin at http://localhost/phpmyadmin, log in with your MySQL credentials, and create a new database called `auth_app` (collation: `utf8mb4_general_ci`).

### 9. Run migrations

```bash
php artisan migrate
```

### 10. Start the server

```bash
php artisan serve
```

Visit http://localhost:8000.

## Deploy to Railway

### 1. Create a Railway account

Sign up at https://railway.app with your GitHub account.

### 2. Create a new project

Click **New Project** and select **Deploy from GitHub Repo**. Choose the `auth-laravel` repo.

### 3. Add a MySQL database

In your project canvas, click **New** > **Database** > **MySQL**.

### 4. Set environment variables

Go to your Laravel service **Variables** tab and add:

```
APP_NAME=AUTH APP
APP_ENV=production
APP_KEY=base64:your_app_key_here
APP_DEBUG=false
APP_URL=${{RAILWAY_PUBLIC_DOMAIN}}

DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}

SESSION_DRIVER=database
SESSION_LIFETIME=120
CACHE_STORE=file
```

Copy the `APP_KEY` value from your local `.env` file.

### 5. Set custom start command

Go to **Settings** and set the custom start command:

```
php artisan migrate --force && /start-container.sh
```

### 6. Generate a public URL

Go to **Settings** > **Networking** > **Public** and generate a domain.

### 7. Deploy

Railway deploys automatically on every push to your repo.

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
