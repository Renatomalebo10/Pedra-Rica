FROM php:8.3-cli AS base

RUN apt-get update && apt-get install -y nodejs npm

RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && pecl install redis && docker-php-ext-enable redis \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --optimize-autoloader --no-scripts

COPY docker/php.ini "$PHP_INI_DIR/conf.d/99-app.ini"

COPY . .

RUN composer dump-autoload --optimize \
    && npm ci && npm run build \
    && mkdir -p storage/framework/{cache,sessions,views} \
    && mkdir -p storage/app/public \
    && mkdir -p bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8000

# Migrate/seed e caches rodam via preDeployCommand (render.yaml) durante o deploy,
# separados do start do servidor para nao travar o health check (/up).
CMD ["sh", "-c", "php artisan storage:link && { if [ -z \"$APP_KEY\" ] || [ \"$APP_KEY\" = \"base64:\" ]; then php artisan key:generate; fi; } && php artisan serve --host=0.0.0.0 --port=$PORT"]
