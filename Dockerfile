FROM php:8.0.21RC1-zts-alpine3.16
FROM composer:2.3.7
COPY . /app
WORKDIR /app
EXPOSE 8080

RUN composer install
CMD tail -f /dev/null

#docker build -t chipskein/laravel .
#docker run -p 8080:8080 -v $(pwd):/app chipskein/laravel
#docker ps
#docker exec -it ${container_name}
#php artisan serve --host 0.0.0.0 --port=8080
