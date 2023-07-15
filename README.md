## Deployment

#### Requirements:
- Installed docker and docker-compose 

Deployment tested on Linux platform Centos 8

We have several steps, please execute commands from root path of project


#### Copy environment variables:
```cp .env.example .env```

#### Download and run our containers in background:

```docker-compose up -d```

#### Execute migrations and sync with api:

```docker exec -it app php artisan migrate && php artisan api:sync```

#### Execute tests:

```docker exec -it app php artisan test```

#### Start our server:

```docker exec -it app php -S 0.0.0.0:8000 -t public```

#### Open this link in your browser: http://0.0.0.0:8000/
