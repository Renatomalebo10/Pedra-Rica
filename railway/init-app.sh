#!/bin/bash
set -e

php artisan storage:link
php artisan migrate --force

VALUE=$(php artisan tinker --execute 'echo \App\Models\User::where("email", "admin@pedrarica.com")->exists() ? "1" : "0";')

if [ "$VALUE" != "1" ]; then
    php artisan db:seed --force
fi

php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
