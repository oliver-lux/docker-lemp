FROM nginx:1.20-alpine

ARG USER_ID

# Install system dependencies
RUN apk add --no-cache \
    sudo bash nano curl zip \
    shadow

# Requires shadow package
RUN usermod -u $USER_ID nginx && groupmod -g $USER_ID nginx

# Add host config file
ADD ./nginx.conf /etc/nginx/
ADD ./default.conf /etc/nginx/conf.d/

RUN mkdir -p /var/www/html
