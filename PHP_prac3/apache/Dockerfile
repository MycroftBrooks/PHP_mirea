FROM php:apache
RUN docker-php-ext-install mysqli  && \
    a2enmod authn_dbd && \
    apt-get update && \
    apt-get install -y libaprutil1-dbd-mysql