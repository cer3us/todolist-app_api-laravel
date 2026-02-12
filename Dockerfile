FROM php:8.2-fpm

# Install system dependencies / Установить зависимости
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache / Очистить кэш
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions / Установить PHP расширения
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer / Установить последнюю версию Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-interaction

RUN php artisan key:generate

CMD php artisan serve --host=0.0.0.0 --port=8000