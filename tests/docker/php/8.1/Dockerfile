FROM --platform=linux/amd64 php:8.1.11-cli-alpine

RUN apk add unzip zlib-dev libzip-dev
RUN docker-php-ext-install zip sockets bcmath pcntl

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /var/www

CMD ["sleep", "infinity"]