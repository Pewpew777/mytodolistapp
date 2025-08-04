#!/usr/bin/env bash
set -o errexit

# Install Node modules and build Vite assets
npm install
npm run build

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Set Laravel key
php artisan key:generate

# Run database migrations
php artisan migrate --force
