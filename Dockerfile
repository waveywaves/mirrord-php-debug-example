FROM php:8.2-apache

# Install and enable the phpredis extension
RUN pecl install redis && docker-php-ext-enable redis

# Copy the source files
COPY src/ /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

# Set the ServerName to suppress the warning
RUN echo "ServerName localhost">> /etc/apache2/apache2.conf