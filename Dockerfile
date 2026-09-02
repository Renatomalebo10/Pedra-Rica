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

# Migrate/seed/caches rodam no boot e NUNCA travam o start: se o banco
# estiver indisponivel, o servidor sobe mesmo assim (evita deploy 500).
CMD ["sh", "-c", "php artisan storage:link >/dev/null 2>&1; { if [ -z \"$APP_KEY\" ] || [ \"$APP_KEY\" = \"base64:\" ]; then php artisan key:generate --force; fi; }; php artisan app:initialize || echo 'AVISO: inicializacao falhou, subindo servidor mesmo assim'; php artisan serve --host=0.0.0.0 --port=$PORT"]
