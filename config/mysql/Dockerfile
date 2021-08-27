FROM alpine:3.14

ARG BUILD_DATE
ARG VCS_REF

RUN apk add --update --no-cache \
    # common
    bash nano \
     # enable timezone modification
    tzdata \
    # database
    mariadb mariadb-client mariadb-server-utils pwgen

ADD files/run.sh /scripts/run.sh

RUN mkdir /docker-entrypoint-initdb.d && \
    mkdir /scripts/pre-exec.d && \
    mkdir /scripts/pre-init.d && \
    chmod -R 755 /scripts

EXPOSE 3306

VOLUME ["/var/lib/mysql"]

ENTRYPOINT ["/scripts/run.sh"]
