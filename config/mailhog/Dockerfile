FROM mailhog/mailhog:latest

USER root

RUN apk add --update --no-cache \
    # common
    bash nano \
     # enable timezone modification
    tzdata

USER mailhog
