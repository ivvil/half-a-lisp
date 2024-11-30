FROM php:8.3-apache
ENV debian_frontend=nointeractive

    # Update packages
RUN apt update

# Añadir o modificar la configuración de Apache para listar directorios si no hay index
RUN echo '<Directory /var/www/html>' >> /etc/apache2/apache2.conf
RUN echo 'Options +Indexes' >> /etc/apache2/apache2.conf
RUN echo '</Directory>' >> /etc/apache2/apache2.conf

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN echo "zend_extension =$(find /usr/local/lib/php/extensions -name xdebug.so)" >> /usr/local/etc/php/conf.d/xdebug.ini
RUN echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini

EXPOSE 80