FROM php:8.1-fpm-alpine

#ENV XDEBUG_VERSION 3.2
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN apk update \
    && apk upgrade \
    && apk add --no-cache postgresql-dev freetype-dev libjpeg-turbo-dev libpng-dev libzip-dev fcgi \
#    php81-pecl-xdebug \
    && docker-php-ext-install pdo pdo_mysql \
#    && docker-php-ext-enable xdebug \
    && apk del libzip-dev

RUN apk add --no-cache pcre-dev $PHPIZE_DEPS \
        && pecl install redis \
        && docker-php-ext-enable redis.so

RUN apk add --update linux-headers
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug


RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./php-fpm/conf.d /usr/local/etc/php/conf.d


WORKDIR /app
