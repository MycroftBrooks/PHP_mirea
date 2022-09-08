FROM php:apache
WORKDIR /var/www/html/
COPY . .
RUN docker-php-ext-install mysqli
EXPOSE 80