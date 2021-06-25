# CRM для контент-отдела

#### Полезные ссылки
http://laraveldoctrine.org/docs/1.4/orm/repositories

### Запуск докер-контейнеров
curl -s "https://laravel.build/example-app" | bash
cd example-app
./vendor/bin/sail up

### Запуск команд через докер:
./ctrl exec-dev "php ...."

#### Настраиваем doctrine migrations:
http://laraveldoctrine.org/docs/current/migrations/installation

##Работа с миграциями Doctrine
#### Сгенерировать миграцию:
http://laraveldoctrine.org/docs/1.4/migrations/generate
./ctrl exec-dev "php artisan doctrine:migrations:generate"
./ctrl exec-dev "php artisan doctrine:migrations:diff"
./ctrl exec-dev "php artisan doctrine:migrations:migrate"
./ctrl exec-dev "php artisan doctrine:generate:proxies"
./ctrl exec-dev "php artisan doctrine:migrations:refresh"

#### Seed
./ctrl exec-dev "php artisan db:seed"

#### Импортировать из базы.
./ctrl exec-dev "php artisan doctrine:mapping:import "App\Entity" annotation --path=src/Entity"

### Настраиваем Doctrine ORM
./ctrl exec-dev 'php artisan vendor:publish --tag="config" --provider="LaravelDoctrine\ORM\DoctrineServiceProvider"'

### Сконфигурировать путь к сущностям doctrine:
config/doctrine.php

### Настройка Xdebug3 для Laravel-приложения в Docker
docker exec-dev -it  picfind_laravel_php /bin/sh

### Устанавливаем зависимости проекта с помощью отдельного докер-образа
docker run --rm --interactive --tty \
--volume $PWD:/var/www \
composer require reinink/remember-query-strings

### Настраиваем Inertia
https://inertiajs.com/server-side-setup

docker run --rm --interactive --tty \
--volume $PWD:/app \
composer require inertiajs/inertia-laravel

# Залить в локальную бд
gunzip < /bighdd/dumps/picfind_04_05_2021.sql.gz | mysql -h127.0.0.1 -u sail -ppassword picfind_laravel

### Проверка роутингов
./ctrl exec-dev "php artisan route:list"

#### Generating Commands
https://laravel.com/docs/8.x/artisan#introduction

./ctrl exec-dev "php artisan make:command UpdateCategories"

### Commands
./ctrl exec-dev "php artisan picfind:update-categories"
./ctrl exec-dev "php artisan picfind:update-suppliers"
./ctrl exec-dev "php artisan picfind:remove:old-suppliers"
./ctrl exec-dev "php artisan picfind:remove:old-skus"
./ctrl exec-dev "php artisan picfind:remove:old-categories"
./ctrl exec-dev "php artisan picfind:group-images {days} {supplier?}"
./ctrl exec-dev "php artisan picfind:update-shop-image-fields"
./ctrl exec-dev "php artisan picfind:update-shop-image-names"
./ctrl exec-dev "php artisan picfind:analyze-shop-images"
./ctrl exec-dev "php artisan picfind:import-shop-images"
./ctrl exec-dev "php artisan picfind:update-suppliers-have-new-products"
./ctrl exec-dev "php artisan picfind:update-manufacturers"
./ctrl exec-dev "php artisan picfind:remove:old-manufacturers"

./ctrl exec-dev 'composer require "gedmo/doctrine-extensions"'

./ctrl exec-dev 'php artisan vendor:publish --tag="config" --provider="LaravelDoctrine\ORM\DoctrineServiceProvider"'
./ctrl exec-dev 'php artisan make:auth'

./ctrl exec-dev 'php -m'





