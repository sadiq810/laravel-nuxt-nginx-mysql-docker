FROM php:8.2-fpm-alpine

WORKDIR /var/www/app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions

#RUN docker-php-ext-install pdo pdo_mysql zlib gd
#https://github.com/mlocati/docker-php-extension-installer
RUN install-php-extensions pdo pdo_mysql gd zip exif

USER root

RUN chmod 777 -R /var/www/app
