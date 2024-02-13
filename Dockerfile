FROM php:7.4-apache

RUN apt-get update && \
    apt-get install -y \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libzip-dev \
        unzip \
        && docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql pdo_pgsql zip \
	&& curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html

RUN composer require slim/slim \
    && composer require nyholm/psr7 \
    && composer require nyholm/psr7-server \
    && composer require fakerphp/faker \
    && composer require slim/php-view

EXPOSE 80

CMD ["apache2-foreground"]
