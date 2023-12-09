# GLPI

Ce projet permet le déploiement de l'application GLPI dans un environnement Docker.

## Environnement Docker

### Structure
```
docker
├── docker-compose.yml
├── mariadb
│   ├── Dockerfile
│   └── tests
│       ├── mariadb_commandTests.yml
│       └── mariadb_metadataTest.yml
├── nginx
│   ├── config
│   │   ├── conf.d
│   │   │   ├── glpi.int.rcacloud.it.conf
│   │   │   └── php-fpm.conf
│   │   └── nginx.conf
│   ├── Dockerfile
│   └── tests
│       ├── nginx_commandTests.yml
│       ├── nginx_fileExistenceTests.yml
│       └── nginx_metadataTest.yml
└── php-fpm
    ├── config
    │   ├── glpi
    │   │   └── local_define.php
    │   ├── mariadb
    │   │   └── scripts
    │   │       ├── create_glpi_alerts.php
    │   │       └── grant_timezones.php
    │   └── php-fpm
    │       ├── glpi.conf
    │       └── php.ini
    ├── Dockerfile
    ├── entrypoint.sh
    ├── healthcheck.sh
    └── tests
        ├── php_fpm_commandTests.yml
        ├── php_fpm_fileExistenceTests.yml
        └── php_fpm_metadataTest.yml
```
Le répertoire `docker` contient l'ensemble des éléments qui composent l'architecture de [GLPI](https://glpi-project.org/) :

* Un serveur web (NGINX)
* Le langage PHP (PHP-FPM)
* Une base de données (MariaDB)
