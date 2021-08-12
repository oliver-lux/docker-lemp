FROM nginx:1.20-alpine

ARG USER_ID

# Install system dependencies
RUN apk add --no-cache \
    sudo bash nano curl zip \
    shadow

# Requires shadow package
RUN usermod -u $USER_ID nginx && groupmod -g $USER_ID nginx

# Add host config file
ADD ./default.conf /etc/nginx/conf.d/

RUN mkdir -p /var/www/html

# ARG NGINXGROUP
# ARG NGINXUSER

# ENV NGINXGROUP=${NGINXGROUP}
# ENV NGINXUSER=${NGINXUSER}

# RUN sed -i "s/user www-data/user ${NGINXUSER}/g" /etc/nginx/nginx.conf

# ADD ./default.conf /etc/nginx/conf.d/

# RUN mkdir -p /var/www/html

# RUN adduser -g ${NGINXGROUP} -s /bin/sh -D ${NGINXUSER}; exit 0
