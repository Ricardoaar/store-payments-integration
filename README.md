# Place to pay integration

## Introduction

Web application for paying integration. In this project, we will use [`PlacetoPay`](https://sites.placetopay.com/) to
handle payment.

## Setup

### Install dependencies

`npm install && composer install`

### Fill important environment variables

Run `cp .env.example .env`
Then configure:

* `PLACE2_PAY_LOGIN`
* `PLACE2_PAY_TRANS_KEY`
* `PLACE2_PAY_BASE_URL`
* `DB_DATABASE`
* `DB_USERNAME`
* `DB_PASSWORD`

Remember rename `.env.example` to `.env`

### Migrate and configure database

if you want to avoid using your local Mysql or postgresql or any sql database, you could use `docker-compose up -d` to
create a **container with your database just for this project**.
_Learn more about [**docker compose**](https://docs.docker.com/compose/)_

Then run `php artisan migrate:install; php artisan migrate --seed`

Credentials for users are:
**Admin**

**Email**: admin@gmail.com

**Password**: password

**Customer**

## Credentials for testing

**Email**: customer@gmail.com

**Password**: password

## Technologies

* [`Laravel`](https://laravel.com/)
* [`PlacetoPay`](https://sites.placetopay.com/)
* [`TailwindCSS`](https://tailwindcss.com/)
* [`Livewire`](https://laravel-livewire.com/)
* [`Mysql`](https://www.mysql.com/)
*

## Author

[Ricardo Rito Anguiano](https://github.com/captainrun)

