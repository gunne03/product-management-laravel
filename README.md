# Product Management Laravel App
A simple Laravel CRUD application for managing products.

***************************************************************************************************************************************************************************************

# Features
-  List Products (Name, Description, Price)
-  Add Product with validation
-  Edit Product details
-  Delete Product
- Uses MySQL Database

***************************************************************************************************************************************************************************************

# Technologies Used

- Laravel 12
- Bootstrap 5
- MySQL
- Blade Templates

***************************************************************************************************************************************************************************************

# Setup Instructions

```bash
git clone https://github.com/gunne03/product-management-laravel.git
cd product-management-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

***************************************************************************************************************************************************************************************

Author
Gunneet Kaur