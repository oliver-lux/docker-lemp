FROM nginx:stable-alpine

# Install system dependencies
RUN apk add --update --no-cache \
    # common
    bash nano curl zip \
    # enable timezone modification
    tzdata
