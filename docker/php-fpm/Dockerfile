FROM php:8.2-fpm-bullseye

RUN apt -y update \
    && docker-php-ext-install pdo_mysql \
    && apt clean

RUN apt update && apt install -y unzip && pecl install xdebug && docker-php-ext-enable xdebug

COPY ./php-cli/conf.d /usr/local/etc/php/conf.d

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

WORKDIR service
