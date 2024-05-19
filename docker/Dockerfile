FROM dunglas/frankenphp:latest-php8.3.7-bookworm AS builder

WORKDIR /app

ARG WWWGROUP
ENV DEBIAN_FRONTEND noninteractive
ENV TZ=Europe/London
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update \
    && curl -fsSL https://deb.nodesource.com/setup_22.x | bash - &&\
       apt-get install -y nodejs \
    && install-php-extensions \
        pcntl \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY --chown=www-data:www-data ./docker/entrypoint.sh /entrypoint.sh

RUN chmod +x /entrypoint.sh

COPY --chown=www-data:www-data package*.json .

RUN npm install

COPY --chown=www-data:www-data . .

COPY --from=composer /usr/bin/composer /usr/bin/composer
