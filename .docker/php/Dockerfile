FROM dunglas/frankenphp:php8.4 AS base

ARG USER=appuser
ARG USERID=1000
ARG GROUPID=1000

RUN \
    groupadd -g ${GROUPID} ${USER} && \
    useradd ${USER} -u ${USERID} -g ${GROUPID} -m;

# Gives FrankenPHP permission to bind to low ports and set proper ownership to Caddy config and data folders
RUN \
    setcap CAP_NET_BIND_SERVICE=+eip /usr/local/bin/frankenphp; \
    chown -R ${USER}:${USER} /config/caddy /data/caddy;

RUN install-php-extensions \
    pdo_pgsql \
    redis \
    zip \
    opcache \
    intl \
    pcntl \
    @composer

ENV SERVER_NAME=:80

USER ${USER}

FROM base AS development

USER ${USER}

COPY ../.. /app
WORKDIR /app

EXPOSE 80

FROM base AS production

USER root

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

USER ${USER}

COPY ../.. /app
WORKDIR /app
