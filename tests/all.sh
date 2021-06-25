#!/usr/bin/env bash

# Refresh database.
./ctrl exec-dev "php artisan doctrine:migrations:refresh"
# Seed database.
./ctrl exec-dev "php artisan db:seed"
# Run tests.
./ctrl exec-dev "php vendor/phpunit/phpunit/phpunit --configuration phpunit.xml"
