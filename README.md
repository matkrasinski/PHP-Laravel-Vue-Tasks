# PHP-Laravel-Vue-Tasks
A repository for completing several tasks using the PHP, Laravel, and Vue.js

## PHP tasks:
Steps:
- `composer install` to install necessary packages
- `phpunit` to run all tests

## Laravel tasks:
Steps:
- `compose install` to install necessary packages
- `php artisan serve` to run the server
- `php artisan test` to run all tests

## Vue tasks:
Steps:
- `npm install` to install necessary packages
- `npm run serve` to run the application

## Notes:
I used sqlite database for my laravel project. If you also want to us it:
- create database sqlite file in `laravel/database/`
- change values in `.env` file:
  - `DB_CONNECTION`=sqlite
  - `DB_HOST`=127.0.0.1
  - `DB_PORT`=3306
  - `DB_DATABASE`= (ABSOLUTE PATH TO SQLITE FILE)

If you don't want to use sqlite check out `.env.example` for other configuration
