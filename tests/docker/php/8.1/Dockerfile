FROM --platform=linux/amd64 php:8.1.11-cli-alpine

RUN apk add git unzip zlib-dev libzip-dev autoconf g++ make
RUN docker-php-ext-install zip bcmath pcntl
RUN pecl install pcov \
    && docker-php-ext-enable pcov

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /var/www

ENTRYPOINT ["sh", "tests/docker/php/entrypoint.sh"]
CMD ["sleep", "infinity"]