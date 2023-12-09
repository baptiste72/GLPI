FROM php:8.1.14-fpm-bullseye

LABEL description="Set up PHP-FPM for GLPI" \
      maintainer="Team DSI" \
      version="${PHP_VERSION}"

WORKDIR /usr/local/etc

SHELL ["/bin/bash", "-o", "pipefail", "-c"]

# hadolint ignore=DL3008
RUN apt-get update \
 && apt-get upgrade -y \
 && apt-get install -y --no-install-recommends \
	gettext \
	procps \
	unzip \
 && apt-get clean \
 && curl -sSL https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions -o - | sh -s \
	bz2 \
 	exif \
  	gd \
 	ldap \
 	intl \
 	mysqli \
 	opcache \
  	zip \
 && curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash \
 && . ~/.bashrc \
 && nvm install --lts \
 && mkdir /etc/glpi /var/log/glpi \
 && rm -rf pear.conf php-fpm.conf.default php-fpm.d/* php/php.ini-* /var/cache/apt /var/lib/apt/lists/*

COPY config/php-fpm/php.ini php
COPY config/php-fpm/glpi.conf php-fpm.d
COPY config/mariadb/scripts php/scripts

WORKDIR /usr/share/nginx/glpi

COPY config/glpi/local_define.php /etc/glpi
COPY --from=composer:lts /usr/bin/composer /usr/bin/composer
COPY healthcheck.sh entrypoint.sh /

HEALTHCHECK --interval=1m --timeout=3s \
 CMD /healthcheck.sh

ENTRYPOINT ["/entrypoint.sh"]
