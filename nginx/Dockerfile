FROM nginx:1.20-alpine

ARG USER_ID

# Change timezone | requires dependency: tzdata
ARG TZ='Europe/Berlin'
ENV TZ ${TZ}

# Install system dependencies
RUN apk add --no-cache \
    tzdata \
    nano curl zip

# Add host config file
ADD ./nginx.conf /etc/nginx/
ADD ./default.conf /etc/nginx/conf.d/
