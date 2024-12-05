FROM php:8.2-apache

RUN pecl install redis && docker-php-ext-enable redis
COPY src/ /var/www/html/
RUN chown -R www-data:www-data /var/www/html
