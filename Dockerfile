FROM php:8.2-apache

# Set the working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install required dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip \
    && docker-php-ext-install pdo_mysql

# Fix permissions for Laravel and entrypoint
RUN chmod +x /usr/local/bin/docker-php-entrypoint \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Configure Apache for Laravel's public directory
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Enable Apache rewrite module

RUN a2enmod rewrite



# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
