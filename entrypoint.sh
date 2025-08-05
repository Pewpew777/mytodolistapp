#!/bin/bash

# Set permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Laravel setup
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start Apache
apache2-foreground
