## Deployment

#### Requirements:
- Installed docker and docker-compose 

Deployment tested on Linux platform Centos 8

We have several steps, please execute commands from root path of project


#### Copy environment variables:
```cp .env.example .env```

#### Download and run our containers in background:

```docker-compose up -d```

#### Install packages:

```docker exec -it app bash```

```composer install```

```npm install --save-dev vite```

```npm run build```

#### Execute migrations and s`ync with api:

```php artisan migrate && php artisan api:sync```

```exit```

#### Start our server:

```docker exec -it app php -S 0.0.0.0:8000 -t public```

#### Open this link in your browser: http://0.0.0.0:8000/
