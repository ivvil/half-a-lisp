FROM php:8.3-fpm
ENV debian_frontend=nointeractive

    # Update packages
RUN apt update

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN echo "zend_extension =$(find /usr/local/lib/php/extensions -name xdebug.so)" >> /usr/local/etc/php/conf.d/xdebug.ini
RUN echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini
