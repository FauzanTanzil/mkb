<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About MKB Main

MKB Main is a web application for managing various functions related to menus, shopping carts, orders, and user profiles. It is built using the Laravel framework.

## Features

- User Authentication
- Admin Menu Management
- Shopping Cart Management
- Order Management
- User Profile Management
- Home Page

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 7.4
- Composer
- Node.js with NPM
- MySQL or other database supported by Laravel

## Installation

1. Clone this repository:
    ```bash
    git clone https://github.com/FauzanTanzil/mkb-main.git
    cd mkb-main
    ```

2. Install PHP dependencies using Composer:
    ```bash
    composer install
    ```

3. Install frontend dependencies using NPM:
    ```bash
    npm install
    ```

4. Copy `.env.example` to `.env` and adjust your database configuration:
    ```bash
    cp .env.example .env
    ```

5. Generate application key:
    ```bash
    php artisan key:generate
    ```

6. Run database migrations:
    ```bash
    php artisan migrate
    ```

7. Start the development server:
    ```bash
    php artisan serve
    ```

8. Compile frontend assets:
    ```bash
    npm run dev
    ```

## Usage

- Open `http://localhost:8000` in your browser to access the application.
- Admin can manage menus through the admin page.
- Users can add items to the cart, place orders, and update their profiles.

## Directory Structure

- `app/Http/Controllers` - Contains all the controllers of the application.
- `resources/views` - Contains all the views for the frontend.
- `routes/web.php` - Contains the route definitions for the web application.
- `public/` - Contains public files like CSS, JavaScript, and images.
- `database/migrations` - Contains the database migration files.

## Contributing

If you wish to contribute, please fork the repository and make a pull request. For major changes, please open an issue first to discuss what you would like to change.

## License

This project is licensed under the [MIT License](LICENSE).

## Contact

For more information, you can contact Fauzan Tanzil Habibi via [GitHub](https://github.com/FauzanTanzil).
