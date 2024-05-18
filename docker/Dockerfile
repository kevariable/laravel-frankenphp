FROM dunglas/frankenphp:latest-php8.3.7-bookworm

WORKDIR /app

ARG WWWGROUP
ENV DEBIAN_FRONTEND noninteractive
ENV TZ=Europe/London
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update \
    && install-php-extensions \
        pcntl

COPY --chown=www-data:www-data . .

COPY --from=composer /usr/bin/composer /usr/bin/composer

ENTRYPOINT ["php", "artisan", "octane:frankenphp"]
