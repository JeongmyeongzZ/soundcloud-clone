FROM composer:2 as composer

FROM php:7.4-apache

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install git libpng-dev zlib1g-dev libzip-dev libjpeg-dev libxml2-dev -yqq

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

#RUN pecl install xdebug
RUN pecl install xdebug-2.9.2

RUN docker-php-ext-install zip tokenizer pcntl json exif bcmath pdo_mysql

RUN docker-php-ext-enable xdebug

#RUN echo "xdebug.mode=debug" >> "$PHP_INI_DIR/php.ini-development" \
#    && echo "xdebug.start_with_request=yes" >> "$PHP_INI_DIR/php.ini-development" \
#    && echo "xdebug.remote_connect_back=off" >> "$PHP_INI_DIR/php.ini-development" \
#    && echo "xdebug.client_host=host.docker.internal" >> "$PHP_INI_DIR/php.ini-development" \
#    && echo "xdebug.client_port=9005" >> "$PHP_INI_DIR/php.ini-development" \
#    && echo "xdebug.idekey=PHPSTORM" >> "$PHP_INI_DIR/php.ini-development"
#RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN echo -e "max_execution_time=0" >> "$PHP_INI_DIR/php.ini-development" \
    && echo "xdebug.remote_enable=1" >> "$PHP_INI_DIR/php.ini-development" \
    && echo "xdebug.remote_autostart=1" >> "$PHP_INI_DIR/php.ini-development" \
    && echo "xdebug.remote_connect_back=off" >> "$PHP_INI_DIR/php.ini-development" \
    && echo "xdebug.remote_host=host.docker.internal" >> "$PHP_INI_DIR/php.ini-development" \
    && echo "xdebug.remote_port=9005" >> "$PHP_INI_DIR/php.ini-development" \
    && echo "xdebug.idekey=PHPSTORM" >> "$PHP_INI_DIR/php.ini-development"
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

ARG UID
ENV UID ${UID:-1000}
ARG GID
ENV GID ${GID:-1000}
RUN usermod -u $UID www-data
RUN groupmod -g $GID www-data
RUN chmod +s /usr/sbin/apache2
RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www
USER www-data
CMD apachectl -D FOREGROUND
