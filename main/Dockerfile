# install php 
FROM php:8.1.13-cli-alpine

#install php dependencies

RUN docker-php-ext-install pdo pdo_mysql sockets

#install composer 
RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#set working dir
WORKDIR /app/

#copy project files 
COPY . .

#install composer dependencies 
RUN composer install 

#start php

CMD php artisan serve --host=0.0.0.0

EXPOSE 8000




