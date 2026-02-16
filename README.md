# GadgetHub - E-commerce Platform

GadgetHub is a modern, full-featured e-commerce platform built with Laravel 11, Livewire 3, Filament 3, and Tailwind CSS. It provides a seamless shopping experience for users and a powerful admin dashboard for store management.

## 🚀 Key Features

*   **User Authentication**: Secure registration, login, and profile management.
*   **Product Browsing**: Browse products by categories, brands, and view detailed product information.
*   **Shopping Cart**: Easy-to-use shopping cart with quantity management.
*   **Checkout & Payments**: Integrated checkout flow with **Stripe** payment processing.
*   **Order Management**: Users can track their orders and view order history.
*   **Admin Dashboard**: comprehensive admin panel powered by **Filament** to manage:
    *   Products & Categories
    *   Brands
    *   Orders & Customers
    *   User Management

## 🛠️ Tech Stack

*   **Backend**: [Laravel 11](https://laravel.com/)
*   **Frontend**: [Livewire 3](https://livewire.laravel.com/), [Tailwind CSS](https://tailwindcss.com/)
*   **Admin Panel**: [Filament 3](https://filamentphp.com/)
*   **Database**: PostgreSQL / MySQL
*   **Payments**: [Stripe](https://stripe.com/)

## 📦 Installation

Follow these steps to set up the project locally:

1.  **Clone the repository**
    ```bash
    git clone https://github.com/your-username/GadgetHub.git
    cd GadgetHub
    ```

2.  **Install PHP dependencies**
    ```bash
    composer install
    ```

3.  **Install Node.js dependencies**
    ```bash
    npm install
    ```

4.  **Environment Setup**
    Copy the `.env.example` file to `.env` and configure your database and Stripe credentials.
    ```bash
    cp .env.example .env
    ```

5.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

6.  **Run Migrations & Seed Database**
    This will set up the database structure and create a default admin user.
    ```bash
    php artisan migrate --seed
    ```

7.  **Build Frontend Assets**
    ```bash
    npm run dev
    ```

8.  **Serve the Application**
    ```bash
    php artisan serve
    ```

    The application will be available at `http://localhost:8000`.

## 🔑 Default Admin Account

After running the seeder, you can log in to the admin panel at `/admin` with the following credentials:

*   **Email**: `admin@mail.com`
*   **Password**: `password`

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
