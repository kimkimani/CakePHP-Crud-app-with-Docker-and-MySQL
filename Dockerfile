# Use an official PHP runtime as a parent image
FROM php:8.2-apache

# Set the working directory to /app
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libicu-dev \
    zlib1g-dev \
    libzip-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql intl zip  \ 
    && docker-php-ext-configure intl


# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy composer.lock and composer.json
COPY composer.json composer.lock /var/www/html/

# Install composer dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-plugins --no-scripts
