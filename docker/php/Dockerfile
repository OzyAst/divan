ARG PHP_VERSION

FROM php:${PHP_VERSION}
RUN apt-get update && apt-get install -y \
            make g++ gcc zlib1g zlib1g-dev curl libevent-dev libidn11-dev \
            libssl-dev git \
            libpq-dev && \
            apt-get clean && \
            rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
            rm /var/log/lastlog /var/log/faillog

RUN docker-php-ext-install pdo_pgsql

RUN groupmod -o -g 1000 www-data && \
    usermod -o -u 1000 -g www-data www-data

WORKDIR /var/www/html