# Use PHP 8.2 with Apache
FROM php:8.2-apache

# Install required system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev unzip libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install zip mysqli pdo pdo_mysql gd

# Install Composer (for dependency management)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install node and npm
RUN apt-get install -y gnupg
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install npm@8.12.1 --global

# Set working directory in the container
WORKDIR /var/www/html

# Copy composer.json and install dependencies
COPY composer.json ./ 
RUN if [ -f composer.json ]; then composer install; fi

# Copy website code into the container
COPY ./html /var/www/html

# Create necessary directories for Smarty and set correct permissions
RUN mkdir -p /var/www/html/templates_c /var/www/html/cache /var/www/html/configs \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/templates_c /var/www/html/cache /var/www/html/configs

# Ensure correct ownership for Apache
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# Expose port 80 for Apache
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
