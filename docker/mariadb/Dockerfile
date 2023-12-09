FROM mariadb:10.6.12

LABEL description="Set up MariaDB for GLPI" \
      maintainer="Team DSI" \
      version="${MARIADB_VERSION}"

RUN apt-get update \
 && apt-get upgrade -y \
 && apt-get clean \
 && rm -rf /var/cache/apt /var/lib/apt/lists/*

ENTRYPOINT ["docker-entrypoint.sh"]

CMD ["mariadbd"]
