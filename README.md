<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Passo a passo

Clone Repositório

```sh
git clone -b laravel-10-com-php-8.1 https://github.com/RicardoGomes335/cms-desafio.git
```

```sh
cd app-laravel
```

Crie o Arquivo .env

```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env

```dosini
APP_NAME=Laravel
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=setup-mysql
DB_PORT=3306
DB_DATABASE=cms
DB_USERNAME=user
DB_PASSWORD=password

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=setup-redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

Suba os containers do projeto

```sh
docker-compose up -d --build
```

Instale as dependências do projeto

```sh
docker exec setup-php composer install
```

Gere a key do projeto Laravel

```sh
docker exec setup-php php artisan key:generate
```

Rode a migration

```sh
docker exec setup-php php artisan php artisan migrate
```

Configure o SMTP server para envio de emails no arquivo .env

```sh
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=seuemail@gmail.com
MAIL_PASSWORD=password
MAIL_ENCRYPTION=TLS
MAIL_FROM_ADDRESS=seuemail@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

Acesso do painel PhpMyAdmin
[http://localhost:8888](http://localhost:8888)

Acesse o projeto
[http://localhost:8080](http://localhost:8080)
