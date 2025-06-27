FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    chromium \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy dependency files
COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

COPY package.json package-lock.json ./
RUN npm install

# Copy application code
COPY . .

# Install testing dependencies
RUN composer require --dev phpunit/phpunit phpstan/phpstan laravel/dusk
RUN npm install --save-dev jest cypress stylelint eslint

# Configure Laravel Dusk (if using Laravel)
ENV DUSK_DRIVER=chrome
RUN php artisan dusk:install

# Expose port
EXPOSE 80

# Start application
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
