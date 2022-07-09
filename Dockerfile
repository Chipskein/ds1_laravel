FROM php:8.0.21RC1-zts-alpine3.16
FROM composer:2.3.7

RUN apk add mariadb mariadb-client
RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY . /app

WORKDIR /app

RUN composer install

EXPOSE 8080

CMD echo "CONTAINER STARTED" && tail -f /dev/null 

#docker build -t chipskein/laravel .
#docker run -p 8080:8080 -v $(pwd):/app chipskein/laravel
#docker ps
#docker exec -it ${container_name} sh
#php artisan serve --host 0.0.0.0 --port=8080
