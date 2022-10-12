FROM php:8.0.19-cli

RUN apt-get update \
    && apt-get install -y curl unzip zlib1g-dev libzip-dev libicu-dev libpq-dev \
    && docker-php-ext-install zip sockets bcmath pcntl \
    && docker-php-ext-enable zip sockets bcmath pcntl \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /var/www

CMD ["sleep", "infinity"]