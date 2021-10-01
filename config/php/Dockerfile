FROM php:8.0-fpm-alpine

ARG USER_ID

RUN apk add --update --no-cache \
    # common
    bash curl git unzip openssh mariadb-client \
    # enable timezone modification
    tzdata \
    # required by health-check.sh
    fcgi \
    # contains usermod util
    shadow \
    # required php extensions
    gmp icu libzip libpng libjpeg

RUN apk add --no-cache --virtual build-deps \
    g++ make autoconf \
    gmp-dev icu-dev libzip-dev libpng-dev libjpeg-turbo-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-jpeg=/usr/include \
    && docker-php-ext-install -j$(nproc) pdo_mysql opcache gd gmp intl zip exif sockets bcmath

RUN pecl install redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Clean build dependencies
RUN apk del build-deps

# Requires shadow package
RUN usermod -u $USER_ID www-data && groupmod -g $USER_ID www-data

# Enable status page
RUN set -xe && echo "pm.status_path = /status" >> /usr/local/etc/php-fpm.d/zz-docker.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Config bash
COPY --chown=www-data:www-data ./files/.bashrc /home/www-data

COPY files/bootstrap.sh /scripts/bootstrap.sh

RUN sh /scripts/bootstrap.sh
