#!/usr/bin/env bash

set -euo pipefail

source ~/.bashrc

chown -R www-data:www-data /var/lib/glpi /usr/share/nginx/glpi/{marketplace,plugins}

php bin/console dependencies install
php bin/console locales:compile

php "${PHP_INI_DIR}/scripts/grant_timezones.php"
php "${PHP_INI_DIR}/scripts/create_glpi_alerts.php"

php bin/console db:configure \
  --no-interaction \
  --reconfigure \
  --db-host=${MARIADB_HOST} \
  --db-name=${MARIADB_DATABASE} \
  --db-user=${MARIADB_USER} \
  --db-password=${MARIADB_PASSWORD}

php bin/console system:check_requirements
php bin/console database:update --no-interaction
php bin/console ldap:synchronize_users --no-interaction

rm -f install/install.php

exec php-fpm "$@"
