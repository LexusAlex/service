FROM php:8.2-cli-bullseye

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

RUN addgroup --gid 1000 service && adduser --uid 1000 --ingroup service -shell /bin/bash --disabled-password service

RUN apt update && apt install -y unzip && pecl install xdebug && docker-php-ext-enable xdebug

COPY ./php-cli/conf.d /usr/local/etc/php/conf.d

RUN apt -y update \
    && docker-php-ext-install pdo_mysql \
    && apt clean


COPY --from=composer:2.5 /usr/bin/composer /usr/local/bin/composer

WORKDIR /service

USER service
