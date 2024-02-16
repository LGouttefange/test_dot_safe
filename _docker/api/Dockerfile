FROM php:8.2-fpm-alpine3.18 AS base

RUN apk add --no-cache bash
RUN set -eux; \
	apk add --no-cache --virtual .build-deps \
	    $PHPIZE_DEPS \
	    postgresql-dev \
    ; \
    docker-php-ext-configure pgsql \
        --with-pgsql=/usr/local/pgsql \
    ; \
	docker-php-ext-install -j$(nproc) \
	    pdo_pgsql \
    ;
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash
RUN apk add symfony-cli

WORKDIR /var/www
RUN mkdir -p /var/www/var/
CMD ["symfony", "server:start"]
EXPOSE 8000

COPY _docker/api/docker-entrypoint.sh /docker-entrypoint.sh
ENTRYPOINT ["/docker-entrypoint.sh"]


# Composer
COPY --from=composer:2.6.5 /usr/bin/composer /usr/bin/composer
