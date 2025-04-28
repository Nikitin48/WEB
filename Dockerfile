FROM php:8.2-apache-bookworm


RUN docker-php-ext-install pdo_mysql


COPY ./src /var/www/html

