FROM mariadb:latest
RUN apt-get update -y
ENV MARIADB_ROOT_PASSWORD=1234
ADD cargainicial.sql /docker-entrypoint-initdb.d/cargainicial.sql
