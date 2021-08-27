FROM php:7.4-fpm-alpine

ARG USER_ID

RUN \
  apk add --update --no-cache \
    # enable colored output
    bash \
    # enable timezone modification
    tzdata \
    # required by health-check.sh
    fcgi \
    # enable usermod command
    shadow \
    # common
    curl unzip \
    # required by intl extension:
    icu \
    # required by zip extension:
    libzip \
    # required by gd extension:
    libpng libjpeg

# Add php build dependencies
RUN apk add --virtual build-deps \
    # required by intl extension:
    icu-dev \
    # required by zip extension:
    libzip-dev \
    # required by gd extension:
    libpng-dev libjpeg-turbo-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-jpeg=/usr/include && \
    docker-php-ext-install -j$(nproc) gd pdo_mysql opcache exif intl sockets bcmath zip

# Clean build dependencies
RUN apk del build-deps

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Requires shadow package
RUN usermod -u $USER_ID www-data && groupmod -g $USER_ID www-data

# Enable status page
RUN set -xe && echo "pm.status_path = /status" >> /usr/local/etc/php-fpm.d/zz-docker.conf

# Requires fcgi package
ADD ./files/health-check.sh /usr/local/bin/
