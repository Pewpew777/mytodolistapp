#!/bin/sh
# Run Laravel migrations (ignore errors if DB isn't ready)
php artisan migrate --force || true
# Start Apache
apache2-foreground