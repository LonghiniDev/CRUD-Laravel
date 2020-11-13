# Install Laravel

- $ composer create-project laravel/laravel --prefer-dist CRUD
- $ cd crud
- $ composer require laravelcollective/html

# Database Config
### .env
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=crud
- DB_USERNAME=root
- DB_PASSWORD=root

# Migrations

- $ php artisan migrate

# Localhost

- $ php artisan serve

# Data Route

- http://localhost:8000/guitarristas
