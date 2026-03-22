FROM serversideup/php:8.4-fpm-nginx AS base

LABEL maintainer="MarJose Darang"

ARG TIMEZONE

ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=$TIMEZONE

#use the root user for installing dependencies
USER root

RUN apt update -y && apt install -y curl nodejs supervisor unzip tar
RUN curl -fsSL https://bun.com/install | bash

ENV PATH="/root/.bun/bin:${PATH}"

RUN exec /bin/sh

RUN apt autoremove -y
RUN rm -rf /tmp/* /var/tmp/*

# ─── S6 Overlay service definitions ─────────────────────────────────────────
# Drop all service directories into s6-rc.d. S6 auto-discovers them.
# No changes to ENTRYPOINT or CMD are needed — s6 is already PID 1.
# Copy the entire s6-overlay directory structure
COPY etc/s6-overlay /etc/s6-overlay
# Only run scripts need execute permission
RUN find /etc/s6-overlay/s6-rc.d -name 'run' -o -name 'finish' | xargs chmod 755

# use the www-data user to serve the application
USER www-data
