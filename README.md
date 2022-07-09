## ds1 laravel



## Run with [docker](https://www.docker.com/)
#### Build docker image from Dockerfile
            docker build -t repo/tag $PATH_DOCKERFILE
#### Init Server Container
            docker run -p $YOUR_PORT:8080 -v $(pwd):/app repo/tag
#### Access container by shell
            docker exec -it $CONTAINER_NAME sh
#### Init PHP server
            php artisan serve --host 0.0.0.0 --port=8080       
    
## Run Local
### Install dependencies
            composer install
### Start server locally
            php artisan serve
            
            
### Prepare .env
            cp .env.example .env 
            php artisan key:generate
### Config database on .env

### DB Diagram
<img src="https://raw.githubusercontent.com/Chipskein/ds1_laravel/master/database/er.drawio.png">
