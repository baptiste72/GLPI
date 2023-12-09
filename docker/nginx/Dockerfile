FROM nginx:1.22.1

LABEL description="Set up NGINX for GLPI" \
      maintainer="Team DSI" \
      version="${NGINX_VERSION}"

RUN apt-get update \
 && apt-get upgrade -y \
 && apt-get clean \
 && rm -rf /etc/nginx/conf.d/* /usr/share/nginx/html /var/cache/apt /var/lib/apt/lists/*

COPY config /etc/nginx

WORKDIR /usr/share/nginx/glpi

HEALTHCHECK --interval=1m --timeout=3s \
 CMD curl --fail https://glpi.int.rcacloud.it || exit 1

ENTRYPOINT ["nginx", "-g", "daemon off;"]
