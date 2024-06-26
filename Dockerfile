ARG PHP_EXTENSIONS="pdo_mysql redis igbinary bcmath pdo_pgsql"
FROM thecodingmachine/php:8.2-v4-slim-apache AS php
ENV TEMPLATE_PHP_INI=production \
    APACHE_DOCUMENT_ROOT=/var/www/html/public

ENV COMPOSER_ALLOW_SUPERUSER 1

ADD --chown=docker:docker . /var/www/html

WORKDIR /var/www/html

### PHP Development
FROM php AS php-dev

RUN composer install
ENV XDEBUG_MODE=coverage

### PHP Production
FROM php AS php-prod

RUN composer install --quiet --optimize-autoloader
ENV PHP_EXTENSION_IGBINARY=1 \
    PHP_EXTENSION_REDIS=1 \
    OPCACHE_ENABLE=1 \
    OPCACHE_MEMORY_CONSUMPTION=128 \
    OPCACHE_STRINGS_BUFFER=8 \
    OPCACHE_MAX_FILES=10000 \
    OPCACHE_VALIDATE_TIMESTAMPS=0 \
    OPCACHE_REVALIDATE_FREQ=2 \
    OPCACHE_SAVE_COMMENTS=0
COPY ./tools/php.ini /etc/php/8.2/cli/php.ini
COPY ./tools/apache.php.ini /usr/lib/php/8.2/php.ini-production

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan optimize

WORKDIR /var/www/html
