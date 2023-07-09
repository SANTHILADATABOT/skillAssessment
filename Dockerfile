FROM phpdockerio/php:8.1-fpm
WORKDIR "/var/www/html/"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        git \
        php-xdebug \
        php8.1-mysql \
        php8.1-sqlite \
        mysql-client \
        php8.1-redis; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
