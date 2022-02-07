# Place to pay integration

## Introduction

Web application for paying integration. In this project, we will use [`PlacetoPay`](https://sites.placetopay.com/) to
handle payment.

## Setup

### Install dependencies

`npm install && composer install`

### Fill important environment variables

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

Then run `php artisan migrate:install`

## Author

[Ricardo Rito Anguiano](https://github.com/captainrun)

