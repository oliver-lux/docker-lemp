FROM php:7.4-fpm-alpine

ARG USER_ID

# Change timezone | requires dependency: tzdata
ARG TZ='Europe/Berlin'
ENV TZ ${TZ}

# Install system dependencies
RUN apk add --no-cache \
      tzdata \
      nano curl zip \
      shadow fcgi \
      libzip libpng

# Add build dependencies
RUN apk add --virtual build-deps \
      libzip-dev \
      libpng-dev \
      libsodium-dev

# Install PHP extensions
RUN docker-php-ext-install \
      opcache \
      sodium \
      gd \
      zip \
      pdo_mysql

# Clean build dependencies
RUN apk del build-deps

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Requires shadow package
RUN usermod -u $USER_ID www-data && groupmod -g $USER_ID www-data

# Enable status page
RUN set -xe && echo "pm.status_path = /status" >> /usr/local/etc/php-fpm.d/zz-docker.conf

# Requires fcgi package
ADD ./health-check.sh /usr/local/bin/

WORKDIR /var/www/html
