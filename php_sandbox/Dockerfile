# Use PHP 8.2 with Apache
FROM php:7.4-apache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install required system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev unzip libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install zip mysqli pdo pdo_mysql gd \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install gd

# Install Composer (for dependency management)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install node and npm
RUN apt-get install -y gnupg
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install npm@8.12.1 --global

# Install PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set working directory in the container
WORKDIR /var/www/html

# Copy composer.json and install dependencies
RUN if [ -f composer.json ]; then composer install; fi

# Copy website code into the container
COPY ./html /var/www/html

# Create necessary directories for Smarty and set correct permissions
RUN mkdir -p /var/www/html/templates_c /var/www/html/cache /var/www/html/configs \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/templates_c /var/www/html/cache /var/www/html/configs

    
RUN chmod -R 777 /var/www/html/templates_c


# Ensure correct ownership for Apache
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# Expose port 80 for Apache
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
