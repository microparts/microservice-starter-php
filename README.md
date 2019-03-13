Microservice starter for PHP
----------------------------

This starter designed for quick start of microservice development.

Available from the box:
* high performance
* web server (swoole extension required)
* supports set of corporate standards like as: 
[Configuration package](https://github.com/microparts/configuration-php), 
[Pagination](https://github.com/microparts/paginateformatter-php), 
[ServiceInfo](https://github.com/microparts/igni-support-php/blob/master/src/Modules/ServiceInfoModule.php), 
[Healthcheck](https://github.com/microparts/igni-support-php/blob/master/src/Modules/HealthcheckModule.php), 
[i18n](https://github.com/microparts/i18n-php), 
[Logging](https://github.com/microparts/igni-support-php/blob/master/src/Modules/LoggerModule.php) and so on.
* optimized docker image with latest PHP version configured to maximum performance
* instrument to automatically migration and database seeding at app starts (configurable, enabled by default)
* single error handler
* configured PHPUnit for writing Unit-tests
* configured docker-compose 


## Usage

```bash
composer create-project microparts/microservice-starter-php app_name
```

## Run

```bash
php index.php
# or
docker-compose build
docker-compose up -d
```

## Hello

Default hello world.

```bash
$ curl http://0.0.0.0:8080/example | jq .
  % Total    % Received % Xferd  Average Speed   Time    Time     Time  Current
                                 Dload  Upload   Total   Spent    Left  Speed
100    16  100    16    0     0    616      0 --:--:-- --:--:-- --:--:--   640
{
  "punks": "hoy!"
}
```

Default service info:

```bash
$ curl http://0.0.0.0:8080/ | jq .
  % Total    % Received % Xferd  Average Speed   Time    Time     Time  Current
                                 Dload  Upload   Total   Spent    Left  Speed
100   227  100   227    0     0  31642      0 --:--:-- --:--:-- --:--:-- 32428
{
  "service": {
    "name": "Microservice starter, PHP",
    "about": "Default template for quick writing microservice..",
    "version": "0.1.0",
    "docs": null,
    "contacts": "ask@teamc.io",
    "copyright": "teamc.io © 2019"
  },
  "message": "hello stranger!"
}
```

## Notices

* For enabling connection to the PostgreSQL database uncomment the line in `./bootstrap.php` file.
* Information about this service located at `./configuration/defaults/service.yaml`.

## License

GNU GPL v3
