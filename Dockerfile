FROM php:8.0.21RC1-zts-alpine3.16
FROM composer:2.3.7
COPY . /app
WORKDIR /app
EXPOSE 8080
# keep running DOCKER CONTAINER
RUN echo "TESTANDO DEVCONTAINER"
#CMD tail -f /dev/null
#CMD [ "php", "artisan","serve","--host","0.0.0.0","--port=8080"]

#docker build -t chipskein/laravel .
#docker run -p 3000:8080 chipskein/laravel